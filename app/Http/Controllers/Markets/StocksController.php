<?php

namespace App\Http\Controllers\Markets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    public function index()
    {
        // داده‌های نمونه برای بورس
        $stocksData = [
            'overall' => [
                'current' => 2150000,
                'change' => -0.5,
                'low' => 2145000,
                'high' => 2160000,
                'updated_at' => now()->format('H:i:s')
            ],
            'index' => [
                'current' => 1850000,
                'change' => -0.3,
                'low' => 1845000,
                'high' => 1855000,
                'updated_at' => now()->format('H:i:s')
            ],
            'volume' => [
                'current' => 12500,
                'change' => 1.2,
                'low' => 12300,
                'high' => 12700,
                'updated_at' => now()->format('H:i:s')
            ],
            'value' => [
                'current' => 8500,
                'change' => 0.8,
                'low' => 8400,
                'high' => 8600,
                'updated_at' => now()->format('H:i:s')
            ],
            'top_gainers' => [
                [
                    'name' => 'شرکت الف',
                    'symbol' => 'الف',
                    'price' => 15200,
                    'change' => 4.5
                ],
                [
                    'name' => 'شرکت ب',
                    'symbol' => 'ب',
                    'price' => 8500,
                    'change' => 3.8
                ],
                [
                    'name' => 'شرکت ج',
                    'symbol' => 'ج',
                    'price' => 4200,
                    'change' => 3.2
                ]
            ],
            'top_losers' => [
                [
                    'name' => 'شرکت د',
                    'symbol' => 'د',
                    'price' => 7800,
                    'change' => -3.5
                ],
                [
                    'name' => 'شرکت ه',
                    'symbol' => 'ه',
                    'price' => 12400,
                    'change' => -2.8
                ],
                [
                    'name' => 'شرکت و',
                    'symbol' => 'و',
                    'price' => 5600,
                    'change' => -2.2
                ]
            ]
        ];
        
        return view('markets.stocks', compact('stocksData'));
    }
    
    public function getLatestPrices()
    {
        $prices = [
            'overall' => [
                'current' => 2150000,
                'change' => -0.5,
                'low' => 2145000,
                'high' => 2160000,
                'updated_at' => now()->format('H:i:s')
            ],
            'index' => [
                'current' => 1850000,
                'change' => -0.3,
                'low' => 1845000,
                'high' => 1855000,
                'updated_at' => now()->format('H:i:s')
            ],
            'volume' => [
                'current' => 12500,
                'change' => 1.2,
                'low' => 12300,
                'high' => 12700,
                'updated_at' => now()->format('H:i:s')
            ],
            'value' => [
                'current' => 8500,
                'change' => 0.8,
                'low' => 8400,
                'high' => 8600,
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
                    'label' => 'شاخص کل (واحد)',
                    'data' => [2155000, 2153000, 2152000, 2148000, 2150000, 2152000, 2150000],
                    'borderColor' => '#4CAF50',
                    'backgroundColor' => 'rgba(76, 175, 80, 0.1)',
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
    
    public function getMarketOverview()
    {
        $overview = [
            'market_status' => 'open', // یا 'closed'
            'trading_date' => now()->format('Y-m-d'),
            'total_trades' => 458720,
            'market_cap' => 7850000000000,
            'indices' => [
                [
                    'name' => 'شاخص کل',
                    'value' => 2150000,
                    'change' => -0.5,
                    'change_value' => -10750
                ],
                [
                    'name' => 'شاخص هم‌وزن',
                    'value' => 625000,
                    'change' => -0.3,
                    'change_value' => -1875
                ],
                [
                    'name' => 'شاخص 30 شرکت بزرگ',
                    'value' => 98500,
                    'change' => -0.2,
                    'change_value' => -197
                ],
                [
                    'name' => 'شاخص 50 شرکت فعال‌تر',
                    'value' => 185000,
                    'change' => 0.1,
                    'change_value' => 185
                ]
            ],
            'industry_indices' => [
                [
                    'name' => 'بانک‌ها',
                    'value' => 458000,
                    'change' => -1.2,
                    'change_value' => -5496
                ],
                [
                    'name' => 'خودرو',
                    'value' => 325000,
                    'change' => 1.5,
                    'change_value' => 4875
                ],
                [
                    'name' => 'پتروشیمی',
                    'value' => 785000,
                    'change' => -0.8,
                    'change_value' => -6280
                ],
                [
                    'name' => 'فلزات اساسی',
                    'value' => 652000,
                    'change' => 0.5,
                    'change_value' => 3260
                ]
            ]
        ];
        
        return response()->json($overview);
    }
    
    public function getTopStocks()
    {
        $stocks = [
            'top_gainers' => [
                [
                    'name' => 'شرکت الف',
                    'symbol' => 'الف',
                    'price' => 15200,
                    'change' => 4.5,
                    'volume' => 8500000
                ],
                [
                    'name' => 'شرکت ب',
                    'symbol' => 'ب',
                    'price' => 8500,
                    'change' => 3.8,
                    'volume' => 6200000
                ],
                [
                    'name' => 'شرکت ج',
                    'symbol' => 'ج',
                    'price' => 4200,
                    'change' => 3.2,
                    'volume' => 9800000
                ],
                [
                    'name' => 'شرکت ز',
                    'symbol' => 'ز',
                    'price' => 6800,
                    'change' => 2.9,
                    'volume' => 5400000
                ],
                [
                    'name' => 'شرکت ح',
                    'symbol' => 'ح',
                    'price' => 3500,
                    'change' => 2.7,
                    'volume' => 7200000
                ]
            ],
            'top_losers' => [
                [
                    'name' => 'شرکت د',
                    'symbol' => 'د',
                    'price' => 7800,
                    'change' => -3.5,
                    'volume' => 4800000
                ],
                [
                    'name' => 'شرکت ه',
                    'symbol' => 'ه',
                    'price' => 12400,
                    'change' => -2.8,
                    'volume' => 3200000
                ],
                [
                    'name' => 'شرکت و',
                    'symbol' => 'و',
                    'price' => 5600,
                    'change' => -2.2,
                    'volume' => 6500000
                ],
                [
                    'name' => 'شرکت ط',
                    'symbol' => 'ط',
                    'price' => 9200,
                    'change' => -2.0,
                    'volume' => 4100000
                ],
                [
                    'name' => 'شرکت ی',
                    'symbol' => 'ی',
                    'price' => 2800,
                    'change' => -1.8,
                    'volume' => 8900000
                ]
            ],
            'most_active' => [
                [
                    'name' => 'شرکت ک',
                    'symbol' => 'ک',
                    'price' => 5200,
                    'change' => 1.5,
                    'volume' => 15800000
                ],
                [
                    'name' => 'شرکت ل',
                    'symbol' => 'ل',
                    'price' => 7400,
                    'change' => -0.8,
                    'volume' => 14500000
                ],
                [
                    'name' => 'شرکت م',
                    'symbol' => 'م',
                    'price' => 3900,
                    'change' => 2.1,
                    'volume' => 13200000
                ],
                [
                    'name' => 'شرکت ن',
                    'symbol' => 'ن',
                    'price' => 6300,
                    'change' => -1.2,
                    'volume' => 12800000
                ],
                [
                    'name' => 'شرکت س',
                    'symbol' => 'س',
                    'price' => 8100,
                    'change' => 0.5,
                    'volume' => 11500000
                ]
            ]
        ];
        
        return response()->json($stocks);
    }
}
