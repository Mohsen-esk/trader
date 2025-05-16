<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketController extends Controller
{
    // متد index را اضافه کنید (به جای showMarket)
    public function index()
    {
        return view('market.welcome', [
            'title' => 'ارز و طلا',
            'icon' => 'money-bill-wave',
            'route' => 'market'
        ]);
    }

    public function stocks()
    {
        return view('market.welcome', [
            'title' => 'بورس',
            'icon' => 'chart-line',
            'route' => 'stocks'
        ]);
    }
    
    public function gold()
    {
        return view('market.welcome', [
            'title' => 'طلا',
            'icon' => 'coins',
            'route' => 'gold'
        ]);
    }
    
    public function silver()
    {
        return view('market.welcome', [
            'title' => 'نقره',
            'icon' => 'coins',
            'route' => 'silver'
        ]);
    }
    
    public function currency()
    {
        return view('market.welcome', [
            'title' => 'ارز',
            'icon' => 'dollar-sign',
            'route' => 'currency'
        ]);
    }
    
    public function crypto()
    {
        return view('market.welcome', [
            'title' => 'ارز دیجیتال',
            'icon' => 'bitcoin',
            'route' => 'crypto'
        ]);
    }
    
    public function oil()
    {
        return view('market.welcome', [
            'title' => 'نفت',
            'icon' => 'gas-pump',
            'route' => 'oil'
        ]);
    }
}