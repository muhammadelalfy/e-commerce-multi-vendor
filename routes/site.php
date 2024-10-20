<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'front.'], function () {
    Route::resource('products', ProductController::class);
    Route::get('products/{product:slug}', [ProductController::class, 'show'])->name('products.show'); //take slug insted of id and go to show method
    Route::resource('cart', CartController::class);
    Route::get('checkout', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});

