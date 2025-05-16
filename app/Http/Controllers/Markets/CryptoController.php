<?php

namespace App\Http\Controllers\Markets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    public function index()
    {
        // داده‌های نمونه برای ارزهای دیجیتال
        $cryptoData = [
            'bitcoin' => [
                'current' => 65800,
                'change' => 2.5,
                'low' => 64500,
                'high' => 66200,
                'updated_at' => now()->format('H:i:s')
            ],
            'ethereum' => [
                'current' => 3450,
                'change' => 1.8,
                'low' => 3380,
                'high' => 3520,
                'updated_at' => now()->format('H:i:s')
            ],
            'tether' => [
                'current' => 1.00,
                'change' => 0.01,
                'low' => 0.99,
                'high' => 1.01,
                'updated_at' => now()->format('H:i:s')
            ],
            'binance' => [
                'current' => 580,
                'change' => -0.7,
                'low' => 575,
                'high' => 590,
                'updated_at' => now()->format('H:i:s')
            ],
            'solana' => [
                'current' => 145,
                'change' => 3.2,
                'low' => 140,
                'high' => 147,
                'updated_at' => now()->format('H:i:s')
            ],
            'cardano' => [
                'current' => 0.48,
                'change' => 1.5,
                'low' => 0.47,
                'high' => 0.49,
                'updated_at' => now()->format('H:i:s')
            ],
            'xrp' => [
                'current' => 0.65,
                'change' => -0.8,
                'low' => 0.64,
                'high' => 0.67,
                'updated_at' => now()->format('H:i:s')
            ],
            'dogecoin' => [
                'current' => 0.12,
                'change' => 4.5,
                'low' => 0.115,
                'high' => 0.125,
                'updated_at' => now()->format('H:i:s')
            ]
        ];
        
        return view('markets.crypto', compact('cryptoData'));
    }
    
    public function getLatestPrices()
    {
        $prices = [
            'bitcoin' => [
                'current' => 65800,
                'change' => 2.5,
                'low' => 64500,
                'high' => 66200,
                'updated_at' => now()->format('H:i:s')
            ],
            'ethereum' => [
                'current' => 3450,
                'change' => 1.8,
                'low' => 3380,
                'high' => 3520,
                'updated_at' => now()->format('H:i:s')
            ],
            'tether' => [
                'current' => 1.00,
                'change' => 0.01,
                'low' => 0.99,
                'high' => 1.01,
                'updated_at' => now()->format('H:i:s')
            ],
            'binance' => [
                'current' => 580,
                'change' => -0.7,
                'low' => 575,
                'high' => 590,
                'updated_at' => now()->format('H:i:s')
            ],
            'solana' => [
                'current' => 145,
                'change' => 3.2,
                'low' => 140,
                'high' => 147,
                'updated_at' => now()->format('H:i:s')
            ],
            'cardano' => [
                'current' => 0.48,
                'change' => 1.5,
                'low' => 0.47,
                'high' => 0.49,
                'updated_at' => now()->format('H:i:s')
            ],
            'xrp' => [
                'current' => 0.65,
                'change' => -0.8,
                'low' => 0.64,
                'high' => 0.67,
                'updated_at' => now()->format('H:i:s')
            ],
            'dogecoin' => [
                'current' => 0.12,
                'change' => 4.5,
                'low' => 0.115,
                'high' => 0.125,
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
                    'label' => 'بیت کوین (دلار)',
                    'data' => [63000, 64200, 65500, 64800, 65200, 65500, 65800],
                    'borderColor' => '#F7931A',
                    'backgroundColor' => 'rgba(247, 147, 26, 0.1)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4
                ],
                [
                    'label' => 'اتریوم (دلار)',
                    'data' => [3300, 3350, 3400, 3380, 3420, 3430, 3450],
                    'borderColor' => '#627EEA',
                    'backgroundColor' => 'rgba(98, 126, 234, 0.1)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                    'hidden' => true
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