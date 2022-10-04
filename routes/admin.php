<?php

use App\Http\Controllers\Dashboard\CategoriesContrller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::group(['middleware'=>'auth'],function(){
    Route::resource('dashboard/categories' , CategoriesContrller::class);

});
Route::get('/dashboard',[DashboardController::class , 'index'])->middleware(['auth'])->name('dashboard');

