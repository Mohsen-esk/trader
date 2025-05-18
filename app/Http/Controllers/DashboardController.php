<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * نمایش داشبورد کاربر
     */
    public function index()
    {
        $user = auth()->user();
        
        $marketData = [
            'gold' => [
                'price' => '2,850,000',
                'unit' => 'تومان',
                'change' => '+1.5%',
                'status' => 'positive',
            ],
            'silver' => [
                'price' => '25,800',
                'unit' => 'تومان',
                'change' => '+1.2%',
                'status' => 'positive',
            ],
            'bitcoin' => [
                'price' => '65,800',
                'unit' => 'دلار',
                'change' => '+2.5%',
                'status' => 'positive',
            ],
            'stocks' => [
                'price' => '2,150,000',
                'unit' => '',
                'change' => '-0.5%',
                'status' => 'negative',
            ],
        ];
        
        $favorites = [
            [
                'type' => 'gold',
                'name' => 'طلای 18 عیار',
                'price' => '2,850,000 تومان',
                'change' => '+1.5%',
                'status' => 'positive',
                'icon' => 'fas fa-coins',
                'color' => '#FFD700',
            ],
            [
                'type' => 'crypto',
                'name' => 'بیت کوین',
                'price' => '65,800 دلار',
                'change' => '+2.5%',
                'status' => 'positive',
                'icon' => 'fab fa-bitcoin',
                'color' => '#F7931A',
            ],
            [
                'type' => 'crypto',
                'name' => 'اتریوم',
                'price' => '3,450 دلار',
                'change' => '+1.8%',
                'status' => 'positive',
                'icon' => 'fab fa-ethereum',
                'color' => '#627EEA',
            ],
        ];
        
        $activities = [
            [
                'type' => 'login',
                'description' => 'ورود به سیستم از مرورگر Chrome',
                'time' => 'امروز - 10:30',
                'icon' => 'fas fa-sign-in-alt',
            ],
            [
                'type' => 'view',
                'description' => 'بازدید از صفحه طلا',
                'time' => 'امروز - 09:45',
                'icon' => 'fas fa-eye',
            ],
            [
                'type' => 'favorite',
                'description' => 'افزودن بیت کوین به علاقه‌مندی‌ها',
                'time' => 'دیروز - 15:20',
                'icon' => 'fas fa-star',
            ],
        ];
        
        return view('dashboard', compact('user', 'marketData', 'favorites', 'activities'));
    }
}