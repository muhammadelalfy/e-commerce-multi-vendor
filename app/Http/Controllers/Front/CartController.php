<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\CartModelRepository;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public CartModelRepository $repository;
    public function __construct(){
        $this->repository = app()->make(CartRepository::class);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = $this->repository;
        return view('front.cart.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        $product = Product::findOrFail($request->post('product_id'));
        $this->repository->add($product, $request->post('quantity'));
        return redirect()->route('front.cart.index')->with('success', 'Product added to cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        $product = Product::findOrFail($request->post('product_id'));
        $repository = new CartModelRepository();
        $repository->update($product, $request->post('quantity'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $repository = new CartModelRepository();
        $repository->delete($product);
    }
}
