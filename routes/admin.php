<?php

use App\Http\Controllers\Dashboard\{ProductsController, CategoriesContrller, ProfileController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::group(['middleware'=>'auth'],function(){
//categories
    Route::resource('dashboard/categories' , CategoriesContrller::class);
    Route::get('categories/trashed' , [CategoriesContrller::class , 'trashed'])->name('categories.trashed');
    Route::put('categories/{category}/restore' , [CategoriesContrller::class , 'restore'])->name('categories.restore');
    Route::delete('categories/{category}/force-delete' , [CategoriesContrller::class , 'forceDelete'])->name('categories.forceDelete');
//profile
    Route::get('/profile',[ProfileController::class , 'edit'])->name('dashboard.profile.edit');
    Route::patch('/profile',[ProfileController::class , 'update'])->name('dashboard.profile.update');

});

//products
    Route::resource('dashboard/products' , ProductsController::class);

Route::get('/dashboard',[DashboardController::class , 'index'])->middleware(['auth'])->name('dashboard');

Route::get('log' , function (\Illuminate\Http\Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
});
