<?php

use App\Http\Controllers\Dashboard\CategoriesContrller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::group(['middleware'=>'auth'],function(){
    Route::get('categories/trashed' , [CategoriesContrller::class , 'trashed'])->name('categories.trashed');

    Route::resource('dashboard/categories' , CategoriesContrller::class);

    Route::get('dashboard/products' , function (){
        return 'products';
    })->name('dashboard.products');
    Route::put('categories/{category}/restore' , [CategoriesContrller::class , 'restore'])->name('categories.restore');
    Route::delete('categories/{category}/force-delete' , [CategoriesContrller::class , 'forceDelete'])->name('categories.forceDelete');
});

Route::get('/dashboard',[DashboardController::class , 'index'])->middleware(['auth'])->name('dashboard');

