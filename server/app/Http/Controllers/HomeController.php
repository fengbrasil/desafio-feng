<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    public function welcome()
    {
        return view('welcome');
    }
    
    public function home()
    {
        return view('home');
    }
}
