<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;


Route::group(['as' => 'front.' /*, 'middleware' => '2fa'*/], function () {
    Route::resource('products', ProductController::class)->middleware('setAdminStore');
    Route::get('products/{product:slug}', [ProductController::class, 'show'])->name('products.show'); //take slug insted of id and go to show method
    Route::resource('cart', CartController::class);
    Route::get('checkout', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});


// Route::post('two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
//     ->name('two-factor.enable');
// Route::delete('two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
//     ->name('two-factor.disable');


// Route::view('2fa-status', 'front.auth.2fa.change-status')->name('2fa-status')->middleware('auth');
// Route::view('2fa-qr-code', 'front.auth.2fa.qrcode')->middleware('auth');
// Route::view('two-factor-challenge', 'front.auth.2fa.challenge');


