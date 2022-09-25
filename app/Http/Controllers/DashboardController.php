<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    #responce view , redirect , file , json
    public function index(){
//        $view = app()->make('view');
//        return $view->make('dashboard');

//        return View::make('dashboard');
         return response()->view('dashboard.index');

    }
}
