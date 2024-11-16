<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return Product::applyFilters(request()->query())->with(['category:id,name', 'store:id,name'])->paginate();
    return ProductResource::collection(Product::applyFilters(request()->query())->with(['category:id,name', 'store:id,name'])->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth('sanctum')->user()->tokenCan('products.store')) {
            return response()->json([
                'message' => 'You have the ability to store products'
            ]);
        }

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'store_id' => 'required|exists:stores,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'compare_price' => 'required|numeric|gte:price',
            'status' => 'required|in:active,inactive',
        ]);

        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
//        return $product->load(['category:id,name', 'store:id,name']);
        return new ProductResource($product);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'store_id' => 'sometimes|required|exists:stores,id',
            'category_id' => 'sometimes|required|exists:categories,id',
            'price' => 'sometimes|required|numeric',
            'compare_price' => 'sometimes|required|numeric|gte:price',
            'status' => 'sometimes|required|in:active,inactive',
        ]);

        $product->update($request->all());

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }

}
