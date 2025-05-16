<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function gold()
    {
        return view('gold');
    }

    public function silver()
    {
        return view('silver');
        
    }

    public function stocks()
    {
        return view('stocks');
    }
    public function crypto()
    {
        return view('crypto');
    }
    public function oil()
    {
        return view('oil');
        
    }

    public function tools()
    {
        return view('tools');
    }
    public function analysis()
    {
        return view('analysis');
    }
    public function home()
    {
        return view('home');
    }
  
}