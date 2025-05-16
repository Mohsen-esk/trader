@extends('layouts.app')

@section('title', 'قیمت سهام و شاخص‌های بورس | داشبورد بازار')

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
        background-color: #4CAF50;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 15px;
        box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
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
    
    /* کارت شاخص */
    .index-card {
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
    
    .index-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    
    .index-card .card-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }
    
    .index-card .card-icon i {
        font-size: 1.5rem;
        color: white;
    }
    
    .index-card .title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--text-primary);
    }
    
    .index-card .subtitle {
        font-size: 0.85rem;
        color: var(--text-secondary);
        margin-bottom: 20px;
    }
    
    .index-card .value {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--text-primary);
    }
    
    .index-card .change {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 20px;
    }
    
    .index-card .change.positive {
        background-color: rgba(0, 194, 111, 0.1);
        color: var(--accent-color);
    }
    
    .index-card .change.negative {
        background-color: rgba(234, 57, 67, 0.1);
        color: var(--danger-color);
    }
    
    .index-card .range {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid var(--card-border);
    }
    
    .index-card .range .item {
        text-align: center;
    }
    
    .index-card .range .label {
        font-size: 0.85rem;
        color: var(--text-secondary);
        margin-bottom: 5px;
    }
    
    .index-card .range .value {
        font-size: 1rem;
        color: var(--text-primary);
        font-weight: 500;
    }
    
    .index-card .updated-time {
        font-size: 0.8rem;
        color: var(--text-muted);
        margin-top: 20px;
    }
    
    /* جدول سهام */
    .stocks-table-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
    }
    
    .stocks-table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--card-border);
    }
    
    .stocks-table-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
    }
    
    .stocks-table-title i {
        margin-left: 10px;
        color: #4CAF50;
    }
    
    .stocks-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .stocks-table th {
        color: var(--text-secondary);
        font-weight: 500;
        padding: 12px 15px;
        text-align: right;
        border-bottom: 1px solid var(--card-border);
    }
    
    .stocks-table td {
        padding: 15px;
        border-bottom: 1px solid var(--card-border);
        vertical-align: middle;
    }
    
    .stocks-table tr:last-child td {
        border-bottom: none;
    }
    
    .stocks-table tr:hover {
        background-color: var(--hover-bg);
    }
    
    .stocks-table .stock-name {
        display: flex;
        align-items: center;
    }
    
    .stocks-table .stock-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 10px;
        background-color: rgba(76, 175, 80, 0.1);
    }
    
    .stocks-table .stock-icon i {
        color: #4CAF50;
        font-size: 1rem;
    }
    
    .stocks-table .stock-title {
        font-weight: 600;
        color: var(--text-primary);
    }
    
    .stocks-table .stock-subtitle {
        font-size: 0.85rem;
        color: var(--text-secondary);
    }
    
    .stocks-table .stock-value {
        font-weight: 600;
        color: var(--text-primary);
    }
    
    .stocks-table .stock-change {
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
        min-width: 80px;
        text-align: center;
    }
    
    .stocks-table .stock-change.positive {
        background-color: rgba(0, 194, 111, 0.1);
        color: var(--accent-color);
    }
    
    .stocks-table .stock-change.negative {
        background-color: rgba(234, 57, 67, 0.1);
        color: var(--danger-color);
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
        color: #4CAF50;
    }
    
    .chart-container {
        height: 400px;
        position: relative;
    }
    
    /* تب‌های جدول سهام */
    .stocks-tabs {
        display: flex;
        margin-bottom: 20px;
    }
    
    .stocks-tab {
        padding: 10px 20px;
        border-radius: 8px;
        margin-left: 10px;
        cursor: pointer;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .stocks-tab.active {
        background-color: var(--primary-color);
        color: white;
    }
    
    .stocks-tab:not(.active) {
        background-color: var(--hover-bg);
        color: var(--text-secondary);
    }
    
    .stocks-tab:not(.active):hover {
        background-color: var(--card-border);
    }
    
    .stocks-table-container {
        display: none;
    }
    
    .stocks-table-container.active {
        display: block;
    }
</style>
@endsection

@section('content')
<!-- هدر صفحه -->
<div class="market-header">
    <div class="market-title">
        <div class="icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <div>
            <h1>شاخص‌های بورس</h1>
            <p class="market-subtitle">آخرین وضعیت شاخص‌های بورس اوراق بهادار تهران</p>
        </div>
    </div>
    <button id="refresh-btn" class="refresh-btn">
        <i class="fas fa-sync-alt"></i> به‌روزرسانی
    </button>
</div>

<!-- کارت‌های شاخص -->
<div class="row">
    <!-- شاخص کل -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="index-card" id="overall-card">
            <div class="card-icon" style="background-color: #4CAF50;">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="title">شاخص کل</div>
            <div class="subtitle">بورس اوراق بهادار تهران</div>
            <div class="value" id="overall-value">{{ number_format($stocksData['overall']['current'] ?? 2150000) }}</div>
            <div class="change {{ ($stocksData['overall']['change'] ?? -0.5) > 0 ? 'positive' : 'negative' }}" id="overall-change">
                <i class="fas {{ ($stocksData['overall']['change'] ?? -0.5) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $stocksData['overall']['change'] ?? -0.5 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value" id="overall-low">{{ number_format($stocksData['overall']['low'] ?? 2145000) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value" id="overall-high">{{ number_format($stocksData['overall']['high'] ?? 2160000) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: <span id="overall-update-time">{{ $stocksData['overall']['updated_at'] ?? now()->format('H:i:s') }}</span>
            </div>
        </div>
    </div>

    <!-- شاخص هم‌وزن -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="index-card">
            <div class="card-icon" style="background-color: #2196F3;">
                <i class="fas fa-balance-scale"></i>
            </div>
            <div class="title">شاخص هم‌وزن</div>
            <div class="subtitle">بورس اوراق بهادار تهران</div>
            <div class="value">{{ number_format($stocksData['index']['current'] ?? 1850000) }}</div>
            <div class="change {{ ($stocksData['index']['change'] ?? -0.3) > 0 ? 'positive' : 'negative' }}">
                <i class="fas {{ ($stocksData['index']['change'] ?? -0.3) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $stocksData['index']['change'] ?? -0.3 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value">{{ number_format($stocksData['index']['low'] ?? 1845000) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value">{{ number_format($stocksData['index']['high'] ?? 1855000) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: {{ $stocksData['index']['updated_at'] ?? now()->format('H:i:s') }}
            </div>
        </div>
    </div>
    
    <!-- حجم معاملات -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="index-card" id="volume-card">
            <div class="card-icon" style="background-color: #FF9800;">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="title">حجم معاملات</div>
            <div class="subtitle">میلیون سهم</div>
            <div class="value" id="volume-value">{{ number_format($stocksData['volume']['current'] ?? 12500) }}</div>
            <div class="change {{ ($stocksData['volume']['change'] ?? 1.2) > 0 ? 'positive' : 'negative' }}" id="volume-change">
                <i class="fas {{ ($stocksData['volume']['change'] ?? 1.2) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $stocksData['volume']['change'] ?? 1.2 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value" id="volume-low">{{ number_format($stocksData['volume']['low'] ?? 12300) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value" id="volume-high">{{ number_format($stocksData['volume']['high'] ?? 12700) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: <span id="volume-update-time">{{ $stocksData['volume']['updated_at'] ?? now()->format('H:i:s') }}</span>
            </div>
        </div>
    </div>
    
    <!-- ارزش معاملات -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="index-card">
            <div class="card-icon" style="background-color: #9C27B0;">
                <i class="fas fa-coins"></i>
            </div>
            <div class="title">ارزش معاملات</div>
            <div class="subtitle">میلیارد تومان</div>
            <div class="value">{{ number_format($stocksData['value']['current'] ?? 8500) }}</div>
            <div class="change {{ ($stocksData['value']['change'] ?? 0.8) > 0 ? 'positive' : 'negative' }}">
                <i class="fas {{ ($stocksData['value']['change'] ?? 0.8) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $stocksData['value']['change'] ?? 0.8 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value">{{ number_format($stocksData['value']['low'] ?? 8400) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value">{{ number_format($stocksData['value']['high'] ?? 8600) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: {{ $stocksData['value']['updated_at'] ?? now()->format('H:i:s') }}
            </div>
        </div>
    </div>
</div>

<!-- نمودار شاخص -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title"><i class="fas fa-chart-line"></i> نمودار شاخص کل</h3>
            </div>
            <div class="chart-container">
                <canvas id="stocksChartCanvas"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- جدول سهام -->
<div class="row">
    <div class="col-12">
        <div class="stocks-table-card">
            <div class="stocks-table-header">
                <h3 class="stocks-table-title"><i class="fas fa-list"></i> وضعیت سهام‌ها</h3>
            </div>
            
            <div class="stocks-tabs">
                <div class="stocks-tab active" data-tab="gainers">بیشترین رشد</div>
                <div class="stocks-tab" data-tab="losers">بیشترین افت</div>
            </div>
            
            <div class="stocks-table-container active" id="gainers-table">
                <div class="table-responsive">
                    <table class="stocks-table">
                        <thead>
                            <tr>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>تغییر</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocksData['top_gainers'] ?? [] as $stock)
                            <tr>
                                <td>
                                    <div class="stock-name">
                                        <div class="stock-icon">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div>
                                            <div class="stock-title">{{ $stock['name'] }}</div>
                                            <div class="stock-subtitle">{{ $stock['symbol'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="stock-value">{{ number_format($stock['price']) }}</td>
                                <td>
                                    <div class="stock-change positive">
                                        {{ $stock['change'] }}%
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="stocks-table-container" id="losers-table">
                <div class="table-responsive">
                    <table class="stocks-table">
                        <thead>
                            <tr>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>تغییر</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocksData['top_losers'] ?? [] as $stock)
                            <tr>
                                <td>
                                    <div class="stock-name">
                                        <div class="stock-icon">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div>
                                            <div class="stock-title">{{ $stock['name'] }}</div>
                                            <div class="stock-subtitle">{{ $stock['symbol'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="stock-value">{{ number_format($stock['price']) }}</td>
                                <td>
                                    <div class="stock-change negative">
                                        {{ $stock['change'] }}%
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // اسکریپت برای به‌روزرسانی داده‌ها
    document.addEventListener('DOMContentLoaded', function() {
        // تب‌های جدول سهام
        const stocksTabs = document.querySelectorAll('.stocks-tab');
        const stocksTables = document.querySelectorAll('.stocks-table-container');
        
        stocksTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // فعال کردن تب
                stocksTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                // نمایش جدول مربوطه
                stocksTables.forEach(table => {
                    table.classList.remove('active');
                    if (table.id === tabId + '-table') {
                        table.classList.add('active');
                    }
                });
            });
        });
        
        // دکمه به‌روزرسانی
        const refreshBtn = document.getElementById('refresh-btn');
        refreshBtn.addEventListener('click', function() {
            // نمایش حالت در حال بارگیری
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> در حال به‌روزرسانی...';
            this.disabled = true;
            
            // ارسال درخواست به‌روزرسانی به سرور
            fetch('/markets/stocks/latest-prices', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // به‌روزرسانی داده‌ها در صفحه
                updateStocksData(data);
                
                // بازگرداندن دکمه به حالت اولیه
                refreshBtn.innerHTML = '<i class="fas fa-sync-alt"></i> به‌روزرسانی';
                refreshBtn.disabled = false;
                
                // نمایش پیام موفقیت
                showNotification('اطلاعات با موفقیت به‌روزرسانی شد', 'success');
            })
            .catch(error => {
                console.error('خطا در به‌روزرسانی:', error);
                
                // بازگرداندن دکمه به حالت اولیه
                refreshBtn.innerHTML = '<i class="fas fa-sync-alt"></i> به‌روزرسانی';
                refreshBtn.disabled = false;
                
                // نمایش پیام خطا
                showNotification('خطا در به‌روزرسانی اطلاعات', 'error');
            });
        });
        
        // تابع به‌روزرسانی داده‌های بورس در صفحه
        function updateStocksData(data) {
            // به‌روزرسانی شاخص کل
            if (data.overall) {
                document.getElementById('overall-value').innerText = numberFormat(data.overall.current);
                document.getElementById('overall-change').innerHTML = 
                    `<i class="fas ${data.overall.change > 0 ? 'fa-caret-up' : 'fa-caret-down'}"></i> ${data.overall.change}%`;
                document.getElementById('overall-change').className = 
                    `change ${data.overall.change > 0 ? 'positive' : 'negative'}`;
                document.getElementById('overall-low').innerText = numberFormat(data.overall.low);
                document.getElementById('overall-high').innerText = numberFormat(data.overall.high);
                document.getElementById('overall-update-time').innerText = data.overall.updated_at;
            }
            
            // به‌روزرسانی حجم معاملات
            if (data.volume) {
                document.getElementById('volume-value').innerText = numberFormat(data.volume.current);
                document.getElementById('volume-change').innerHTML = 
                    `<i class="fas ${data.volume.change > 0 ? 'fa-caret-up' : 'fa-caret-down'}"></i> ${data.volume.change}%`;
                document.getElementById('volume-change').className = 
                    `change ${data.volume.change > 0 ? 'positive' : 'negative'}`;
                document.getElementById('volume-low').innerText = numberFormat(data.volume.low);
                document.getElementById('volume-high').innerText = numberFormat(data.volume.high);
                document.getElementById('volume-update-time').innerText = data.volume.updated_at;
            }
            
            // به‌روزرسانی نمودار
            updateChart();
        }
        
        // تابع فرمت‌دهی اعداد
        function numberFormat(number, decimals = 0) {
            return new Intl.NumberFormat('fa-IR', {
                minimumFractionDigits: decimals,
                maximumFractionDigits: decimals
            }).format(number);
        }
        
        // تابع نمایش اعلان
        function showNotification(message, type = 'info') {
            // اینجا می‌توانید از کتابخانه‌های نمایش اعلان استفاده کنید
            // مثال ساده:
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.innerText = message;
            notification.style.position = 'fixed';
            notification.style.bottom = '20px';
            notification.style.right = '20px';
            notification.style.padding = '15px 25px';
            notification.style.borderRadius = '8px';
            notification.style.zIndex = '9999';
            
            if (type === 'success') {
                notification.style.backgroundColor = '#4CAF50';
                notification.style.color = 'white';
            } else if (type === 'error') {
                notification.style.backgroundColor = '#F44336';
                notification.style.color = 'white';
            } else {
                notification.style.backgroundColor = '#2196F3';
                notification.style.color = 'white';
            }
            
            document.body.appendChild(notification);
            
            // حذف اعلان بعد از چند ثانیه
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
        
        // راه‌اندازی نمودار
        const ctx = document.getElementById('stocksChartCanvas').getContext('2d');
        let stocksChart;
        
        function initChart() {
            // دریافت داده‌های نمودار از سرور
            fetch('/markets/stocks/chart-data')
                .then(response => response.json())
                .then(chartData => {
                    stocksChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: chartData.labels,
                            datasets: chartData.datasets
                        },
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
                                            return numberFormat(value);
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
                })
                .catch(error => {
                    console.error('خطا در دریافت داده‌های نمودار:', error);
                });
        }
        
        function updateChart() {
            // به‌روزرسانی نمودار با داده‌های جدید
            fetch('/markets/stocks/chart-data')
                .then(response => response.json())
                .then(chartData => {
                    if (stocksChart) {
                        stocksChart.data.labels = chartData.labels;
                        chartData.datasets.forEach((dataset, index) => {
                            if (index < stocksChart.data.datasets.length) {
                                Object.assign(stocksChart.data.datasets[index], dataset);
                            }
                        });
                        stocksChart.update();
                    }
                })
                .catch(error => {
                    console.error('خطا در به‌روزرسانی نمودار:', error);
                });
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
