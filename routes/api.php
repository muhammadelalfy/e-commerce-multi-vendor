<?php

use App\Http\Controllers\Api\Auth\AccessTokenController;
use App\Http\Controllers\Api\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    // Routes for guest users
    Route::middleware('guest:sanctum')->group(function () {
        Route::post('accessToken', [AccessTokenController::class, 'store']);
    });

    // Routes for authenticated users
    Route::middleware('auth:sanctum')->group(function () {
        Route::delete('accessToken/{token?}', [AccessTokenController::class, 'destroy']);
        Route::get('user', function (Request $request) {
            return Auth::guard('sanctum')->user();
        });
        Route::post('logout', [AccessTokenController::class, 'destroy']);
    });
});

// User route with authentication middleware
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::guard('sanctum')->user();
});

// Product resource routes
Route::apiResource('products', ProductsController::class);
