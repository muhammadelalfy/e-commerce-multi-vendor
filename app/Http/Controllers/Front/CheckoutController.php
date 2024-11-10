<?php

namespace App\Http\Controllers\Front;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\CartRepository;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Intl\Countries;

class CheckoutController extends Controller
{

    public function create(CartRepository $cart)
    {
        if ($cart->get()->count() === 0) {
            return redirect()->route('home')->with('error', 'Cart is empty');
        }
        return view('front.checkout', [
            'cart' => $cart,
            'countries' => Countries::getNames(),
        ]);
    }

    public function store(AddressRequest $request, CartRepository $cart)
    {
        DB::beginTransaction();
        try {
            $items = $cart->get();
            foreach ($items->groupBy('product.store_id') as $storeId => $cartItems) {
                $order = Order::create([
                    'user_id' => auth()->id() ?? 1,
                    'status' => 'pending',
                    'store_id' => $storeId,
                    'payment_method' => 'cash',
                ]);

                foreach ($cartItems as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product['id'],
                        'quantity' => $item->quantity,
                        'price' => $item->product->price,
                        'product_name' => $item->product->name,
                    ]);
                }
                foreach ($request->validated()['addr'] as $type => $address) {
                    $address['type'] = $type;
                    $order->addresses()->create($address);
                }
                event(new OrderCreated($order));

            }

            DB::commit();
            return redirect()->route('home')->with('success', 'Order has been placed successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            info($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
