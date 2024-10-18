<?php

namespace App\Http\Controllers\Front;

use App\Enums\ProductStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', ProductStatusEnum::Active)->get();
        return view('front.products.index',compact('products'));
    }

    public function show(Product $product)
    {
        if (!$product->status == ProductStatusEnum::Active)
            abort(404);
        return view('front.products.show',compact('product'));
    }
}
