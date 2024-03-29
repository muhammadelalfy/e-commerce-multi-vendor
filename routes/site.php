<?php

use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'site.'], function () {
    Route::resource('products', ProductController::class);
    Route::get('products/{product:slug}', [ProductController::class, 'show'])->name('products.show'); //take slug insted of id and go to show method

});

