@extends('layouts.app')

@section('title', 'قیمت نقره | داشبورد بازار')

@section('styles')
<style>
    /* استایل‌های اصلی */
    .market-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }
    
    .market-title {
        display: flex;
        align-items: center;
    }
    
    .market-title h1 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        color: var(--text-primary);
    }
    
    .market-title .icon {
        width: 50px;
        height: 50px;
        background-color: #C0C0C0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 15px;
        box-shadow: 0 5px 15px rgba(192, 192, 192, 0.3);
    }
    
    .market-title .icon i {
        color: white;
        font-size: 1.5rem;
    }
    
    .market-subtitle {
        color: var(--text-secondary);
        font-size: 1rem;
        margin-top: 5px;
    }
    
    .refresh-btn {
        background-color: var(--hover-bg);
        border: 1px solid var(--card-border);
        color: var(--text-primary);
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }
    
    .refresh-btn:hover {
        background-color: var(--primary-color);
        color: white;
    }
    
    .refresh-btn i {
        margin-left: 8px;
    }
    
    /* کارت قیمت */
    .price-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        transition: all 0.3s ease;
        text-align: center;
        position: relative;
        overflow: hidden;
        height: 100%;
    }
    
    .price-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    
    .price-card .card-icon {
        width: 50px;
        height: 50px;
        background-color: rgba(192, 192, 192, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }
    
    .price-card .card-icon i {
        font-size: 20px;
        color: #C0C0C0;
    }
    
    .price-card .title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--text-primary);
    }
    
    .price-card .subtitle {
        font-size: 0.85rem;
        color: var(--text-secondary);
        margin-bottom: 20px;
    }
    
    .price-card .price {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--text-primary);
    }
    
    .price-card .change {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 20px;
    }
    
    .price-card .change.positive {
        background-color: rgba(0, 194, 111, 0.1);
        color: var(--accent-color);
    }
    
    .price-card .change.negative {
        background-color: rgba(234, 57, 67, 0.1);
        color: var(--danger-color);
    }
    
    .price-card .updated-time {
        font-size: 0.8rem;
        color: var(--text-muted);
        margin-top: 20px;
    }
    
    /* نمودار */
    .chart-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
    }
    
    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .chart-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
    }
    
    .chart-title i {
        margin-left: 10px;
        color: #C0C0C0;
    }
    
    .chart-container {
        height: 400px;
        position: relative;
    }
</style>
@endsection

@section('content')
<!-- هدر صفحه -->
<div class="market-header">
    <div class="market-title">
        <div class="icon">
            <i class="fas fa-gem"></i>
        </div>
        <div>
            <h1>قیمت نقره</h1>
            <p class="market-subtitle">آخرین قیمت‌های نقره در بازار</p>
        </div>
    </div>
    <button id="refresh-btn" class="refresh-btn">
        <i class="fas fa-sync-alt"></i> به‌روزرسانی
    </button>
</div>

<!-- کارت‌های قیمت نقره -->
<div class="row">
    <!-- نقره گرمی -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card" id="silver-gram-card">
            <div class="card-icon">
                <i class="fas fa-gem"></i>
            </div>
            <div class="title">نقره گرمی</div>
            <div class="subtitle">هر گرم</div>
            <div class="price" id="silver-gram-price">{{ number_format($silverData['gram']['current'] ?? 25000) }} تومان</div>
            <div class="change {{ ($silverData['gram']['change'] ?? 0.8) > 0 ? 'positive' : 'negative' }}" id="silver-gram-change">
                <i class="fas {{ ($silverData['gram']['change'] ?? 0.8) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $silverData['gram']['change'] ?? 0.8 }}%
            </div>
            <div class="updated-time">
                به‌روزرسانی: <span id="silver-gram-update-time">{{ $silverData['gram']['updated_at'] ?? now()->format('H:i:s') }}</span>
            </div>
        </div>
    </div>

    <!-- انس جهانی نقره -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card" id="silver-ounce-card">
            <div class="card-icon">
                <i class="fas fa-globe-americas"></i>
            </div>
            <div class="title">انس جهانی نقره</div>
            <div class="subtitle">اونس</div>
            <div class="price" id="silver-ounce-price">{{ number_format($silverData['ounce']['current'] ?? 28.50, 2) }} دلار</div>
            <div class="change {{ ($silverData['ounce']['change'] ?? 0.6) > 0 ? 'positive' : 'negative' }}" id="silver-ounce-change">
                <i class="fas {{ ($silverData['ounce']['change'] ?? 0.6) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $silverData['ounce']['change'] ?? 0.6 }}%
            </div>
            <div class="updated-time">
                به‌روزرسانی: <span id="silver-ounce-update-time">{{ $silverData['ounce']['updated_at'] ?? now()->format('H:i:s') }}</span>
            </div>
        </div>
    </div>
    
    <!-- نقره مثقالی -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card">
            <div class="card-icon">
                <i class="fas fa-balance-scale"></i>
            </div>
            <div class="title">نقره مثقالی</div>
            <div class="subtitle">هر مثقال</div>
            <div class="price">{{ number_format($silverData['mesghal']['current'] ?? 115000) }} تومان</div>
            <div class="change {{ ($silverData['mesghal']['change'] ?? 0.7) > 0 ? 'positive' : 'negative' }}">
                <i class="fas {{ ($silverData['mesghal']['change'] ?? 0.7) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $silverData['mesghal']['change'] ?? 0.7 }}%
            </div>
            <div class="updated-time">
                به‌روزرسانی: {{ $silverData['mesghal']['updated_at'] ?? now()->format('H:i:s') }}
            </div>
        </div>
    </div>
    
    <!-- نقره خام -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card">
            <div class="card-icon">
                <i class="fas fa-gem"></i>
            </div>
            <div class="title">نقره خام</div>
            <div class="subtitle">هر کیلوگرم</div>
            <div class="price">{{ number_format($silverData['kilogram']['current'] ?? 25000000) }} تومان</div>
            <div class="change {{ ($silverData['kilogram']['change'] ?? 0.9) > 0 ? 'positive' : 'negative' }}">
                <i class="fas {{ ($silverData['kilogram']['change'] ?? 0.9) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $silverData['kilogram']['change'] ?? 0.9 }}%
            </div>
            <div class="updated-time">
                به‌روزرسانی: {{ $silverData['kilogram']['updated_at'] ?? now()->format('H:i:s') }}
            </div>
        </div>
    </div>
</div>

<!-- نمودار قیمت -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title"><i class="fas fa-chart-line"></i> نمودار قیمت نقره</h3>
            </div>
            <div class="chart-container">
                <canvas id="silverChartCanvas"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // اسکریپت برای به‌روزرسانی داده‌ها
    document.addEventListener('DOMContentLoaded', function() {
        // دکمه به‌روزرسانی
        const refreshBtn = document.getElementById('refresh-btn');
        refreshBtn.addEventListener('click', function() {
            // نمایش حالت در حال بارگیری
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> در حال به‌روزرسانی...';
            this.disabled = true;
            
            // ارسال درخواست به‌روزرسانی به سرور
            fetch('/api/silver-prices/refresh', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // به‌روزرسانی داده‌ها در صفحه
                updateSilverPrices(data);
                
                // بازگرداندن دکمه به حالت اولیه
                refreshBtn.innerHTML = '<i class="fas fa-sync-alt"></i> به‌روزرسانی';
                refreshBtn.disabled = false;
            })
            .catch(error => {
                console.error('خطا در به‌روزرسانی:', error);
                
                // بازگرداندن دکمه به حالت اولیه
                refreshBtn.innerHTML = '<i class="fas fa-sync-alt"></i> به‌روزرسانی';
                refreshBtn.disabled = false;
            });
        });
        
        // تابع به‌روزرسانی قیمت‌های نقره در صفحه
        function updateSilverPrices(data) {
            // به‌روزرسانی نقره گرمی
            if (data.gram) {
                document.getElementById('silver-gram-price').innerText = numberFormat(data.gram.current) + ' تومان';
                document.getElementById('silver-gram-change').innerHTML = 
                    `<i class="fas ${data.gram.change > 0 ? 'fa-caret-up' : 'fa-caret-down'}"></i> ${data.gram.change}%`;
                document.getElementById('silver-gram-change').className = 
                    `change ${data.gram.change > 0 ? 'positive' : 'negative'}`;
                document.getElementById('silver-gram-update-time').innerText = data.gram.updated_at;
            }
            
            // به‌روزرسانی انس جهانی نقره
            if (data.ounce) {
                document.getElementById('silver-ounce-price').innerText = numberFormat(data.ounce.current, 2) + ' دلار';
                document.getElementById('silver-ounce-change').innerHTML = 
                    `<i class="fas ${data.ounce.change > 0 ? 'fa-caret-up' : 'fa-caret-down'}"></i> ${data.ounce.change}%`;
                document.getElementById('silver-ounce-change').className = 
                    `change ${data.ounce.change > 0 ? 'positive' : 'negative'}`;
                document.getElementById('silver-ounce-update-time').innerText = data.ounce.updated_at;
            }
            
            // به‌روزرسانی نمودار
            updateChart(data);
        }
        
        // تابع فرمت‌دهی اعداد
        function numberFormat(number, decimals = 0) {
            return new Intl.NumberFormat('fa-IR', {
                minimumFractionDigits: decimals,
                maximumFractionDigits: decimals
            }).format(number);
        }
        
        // راه‌اندازی نمودار
        const ctx = document.getElementById('silverChartCanvas').getContext('2d');
        let silverChart;
        
        function initChart() {
            // داده‌های نمونه برای نمودار
            const sampleData = {
                labels: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر'],
                datasets: [{
                    label: 'قیمت نقره (تومان)',
                    data: [22000, 22500, 23000, 23800, 24500, 24800, 25000],
                    borderColor: '#C0C0C0',
                    backgroundColor: 'rgba(192, 192, 192, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            };
            
            silverChart = new Chart(ctx, {
                type: 'line',
                data: sampleData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            ticks: {
                                callback: function(value) {
                                    return numberFormat(value) + ' تومان';
                                }
                            }
                        }
                    },
                    interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false
                    }
                }
            });
        }n
        
        function updateChart(data) {
            // به‌روزرسانی نمودار با داده‌های جدید
            if (silverChart && data.chart) {
                silverChart.data.labels = data.chart.labels;
                silverChart.data.datasets[0].data = data.chart.values;
                silverChart.update();
            }
        }
        
        // راه‌اندازی نمودار در صورت وجود کتابخانه Chart.js
        if (typeof Chart !== 'undefined') {
            initChart();
        } else {
            console.warn('Chart.js not loaded');
        }
        
        // بروزرسانی خودکار هر 5 دقیقه
        setInterval(() => {
            refreshBtn.click();
        }, 5 * 60 * 1000);
    });
</script>
@endsection