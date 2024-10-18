<?php

namespace App\Repositories;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartModelRepository implements CartRepository
{
    public $items;

    public function __construct()
    {
        $this->items = collect([]);
    }
    public function get()
    {
        if (!$this->items->isEmpty()) {
            return $this->items;

        }
        return $this->items = Cart::with('product')
            ->get();
    }

    public function add(Product $product, $quantity = 1)
    {
        if (!$this->items->isEmpty()) {
            $item = $this->items->firstWhere('product_id', $product->id);
            if (!is_null($item)) {
                return $this->update($product, $item->quantity + $quantity);
            }
        }

        $item = Cart::create([
            'product_id' => $product->id,
            'quantity' => $quantity,
            'user_id' => auth()->user()->id ?? 1
        ]);
        $this->items->push($item);
    }

    public function update($id, $quantity)
    {
        return Cart::where('id', $id)
            ->update([
            'quantity' => $quantity
        ]);
    }

    public function delete($id)
    {
        return Cart::where('product_id', $id)
            ->delete();
    }

    public function empty()
    {
        return Cart::query()->delete();
    }

    public function total(): float
    {
        return $this->get()->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    }



}
