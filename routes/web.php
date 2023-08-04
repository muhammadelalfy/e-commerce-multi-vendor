<?php

use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [\App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');

// Route::view('/{any?}', 'dashboard')
//     ->name('dashboard')
//     ->where('any', '.*');

//products

require __DIR__ . '/auth.php';
require __DIR__ . '/site.php';
require __DIR__ . '/admin.php';
