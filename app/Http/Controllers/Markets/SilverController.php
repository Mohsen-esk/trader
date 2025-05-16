<?php

namespace App\Http\Controllers\Markets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SilverController extends Controller
{
    public function index()
    {
        // داده‌های نمونه برای نقره
        $silverData = [
            'silver999' => [
                'current' => 25800,
                'change' => 1.2,
                'low' => 25400,
                'high' => 26000,
                'updated_at' => now()->format('H:i:s')
            ],
            'silver925' => [
                'current' => 23700,
                'change' => 1.3,
                'low' => 23200,
                'high' => 24000,
                'updated_at' => now()->format('H:i:s')
            ],
            'ounce' => [
                'current' => 28.50,
                'change' => 0.8,
                'low' => 28.15,
                'high' => 28.75,
                'updated_at' => now()->format('H:i:s')
            ],
            'mesghal' => [
                'current' => 115000,
                'change' => 1.1,
                'low' => 113500,
                'high' => 116000,
                'updated_at' => now()->format('H:i:s')
            ]
        ];
        
        return view('markets.silver', compact('silverData'));
    }
    
    public function getLatestPrices()
    {
        $prices = [
            'silver999' => [
                'current' => 25800,
                'change' => 1.2,
                'low' => 25400,
                'high' => 26000,
                'updated_at' => now()->format('H:i:s')
            ],
            'silver925' => [
                'current' => 23700,
                'change' => 1.3,
                'low' => 23200,
                'high' => 24000,
                'updated_at' => now()->format('H:i:s')
            ],
            'ounce' => [
                'current' => 28.50,
                'change' => 0.8,
                'low' => 28.15,
                'high' => 28.75,
                'updated_at' => now()->format('H:i:s')
            ],
            'mesghal' => [
                'current' => 115000,
                'change' => 1.1,
                'low' => 113500,
                'high' => 116000,
                'updated_at' => now()->format('H:i:s')
            ]
        ];
        
        return response()->json($prices);
    }
    
    public function getChartData()
    {
        $chartData = [
            'labels' => ['روز 1', 'روز 2', 'روز 3', 'روز 4', 'روز 5', 'روز 6', 'روز 7'],
            'datasets' => [
                [
                    'label' => 'نقره 999 (تومان)',
                    'data' => [24200, 24500, 24800, 24600, 24900, 25100, 25200],
                    'borderColor' => '#C0C0C0',
                    'backgroundColor' => 'rgba(192, 192, 192, 0.1)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4
                ]
            ]
        ];
        
        return response()->json($chartData);
    }
    
    public function apiPrices()
    {
        return $this->getLatestPrices();
    }
    
    public function apiChart()
    {
        return $this->getChartData();
    }
}