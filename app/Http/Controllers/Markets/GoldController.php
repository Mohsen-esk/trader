<?php

namespace App\Http\Controllers\Markets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoldController extends Controller
{
    public function index()
    {
        // داده‌های نمونه برای طلا
        $goldData = [
            'gold18' => [
                'current' => 2850000,
                'change' => 1.5,
                'low' => 2830000,
                'high' => 2870000,
                'updated_at' => now()->format('H:i:s')
            ],
            'gold24' => [
                'current' => 3800000,
                'change' => 1.3,
                'low' => 3780000,
                'high' => 3820000,
                'updated_at' => now()->format('H:i:s')
            ],
            'ounce' => [
                'current' => 2320,
                'change' => 0.8,
                'low' => 2310,
                'high' => 2330,
                'updated_at' => now()->format('H:i:s')
            ],
            'mesghal' => [
                'current' => 13200000,
                'change' => 1.2,
                'low' => 13150000,
                'high' => 13250000,
                'updated_at' => now()->format('H:i:s')
            ]
        ];
        
        return view('markets.gold', compact('goldData'));
    }
    
    public function getLatestPrices()
    {
        $prices = [
            'gold18' => [
                'current' => 2850000,
                'change' => 1.5,
                'low' => 2830000,
                'high' => 2870000,
                'updated_at' => now()->format('H:i:s')
            ],
            'gold24' => [
                'current' => 3800000,
                'change' => 1.3,
                'low' => 3780000,
                'high' => 3820000,
                'updated_at' => now()->format('H:i:s')
            ],
            'ounce' => [
                'current' => 2320,
                'change' => 0.8,
                'low' => 2310,
                'high' => 2330,
                'updated_at' => now()->format('H:i:s')
            ],
            'mesghal' => [
                'current' => 13200000,
                'change' => 1.2,
                'low' => 13150000,
                'high' => 13250000,
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
                    'label' => 'طلای 18 عیار (تومان)',
                    'data' => [2820000, 2830000, 2840000, 2835000, 2845000, 2850000, 2850000],
                    'borderColor' => '#FFD700',
                    'backgroundColor' => 'rgba(255, 215, 0, 0.1)',
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