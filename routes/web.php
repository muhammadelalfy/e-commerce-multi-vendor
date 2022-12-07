<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GioController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gio', function (){
//    define('IS_PAID' , 0);
//    echo defined('IS_PAID');
echo PHP_SAPI;
});
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';




