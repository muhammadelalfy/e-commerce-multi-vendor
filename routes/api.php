<?php

use App\Http\Controllers\Api\Auth\AccessTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return \Illuminate\Support\Facades\Auth::guard('sanctum')->user();
});

Route::post('login' , [AccessTokenController::class,'store'])->middleware('guest:sanctum');

Route::get('navitems', [\App\Http\Controllers\Api\HomeController::class,'getNavItems']);

