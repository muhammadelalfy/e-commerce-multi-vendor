<?php

namespace App\Http\Controllers\Front;

use App\Enums\ProductStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('status', ProductStatusEnum::Active)
        ->where('store_id', $request->attributes
        ->get('store_id'))->get();
        return response()->json($products);
        return view('front.products.index',compact('products'));
    }

    public function show(Product $product)
    {
        if (!$product->status == ProductStatusEnum::Active)
            abort(404);
        return view('front.products.show',compact('product'));
    }
}
