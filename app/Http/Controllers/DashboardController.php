<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{

//    public function __construct(){

//        $this->middleware(['auth'])->except('index');
//        $this->middleware(['auth'])->only('index');
//    }

    #responce view , redirect , file , json

    public function index(){

//        $view = app()->make('view');

//        return $view->make('dashboard');

//        return View::make('dashboard');

         return response()->view('dashboard.index');

    }
}
