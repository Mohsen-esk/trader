@extends('layouts.app')

@section('title', 'قیمت ارزهای دیجیتال | داشبورد بازار')

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
        background-color: #F7931A;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 15px;
        box-shadow: 0 5px 15px rgba(247, 147, 26, 0.3);
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
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }
    
    .price-card .card-icon img {
        width: 30px;
        height: 30px;
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
    
    .price-card .range {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid var(--card-border);
    }
    
    .price-card .range .item {
        text-align: center;
    }
    
    .price-card .range .label {
        font-size: 0.85rem;
        color: var(--text-secondary);
        margin-bottom: 5px;
    }
    
    .price-card .range .value {
        font-size: 1rem;
        color: var(--text-primary);
        font-weight: 500;
    }
    
    .price-card .updated-time {
        font-size: 0.8rem;
        color: var(--text-muted);
        margin-top: 20px;
    }
    
    /* جدول قیمت‌ها */
    .price-table-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
    }
    
    .price-table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--card-border);
    }
    
    .price-table-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
    }
    
    .price-table-title i {
        margin-left: 10px;
        color: #F7931A;
    }
    
    .price-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .price-table th {
        color: var(--text-secondary);
        font-weight: 500;
        padding: 12px 15px;
        text-align: right;
        border-bottom: 1px solid var(--card-border);
    }
    
    .price-table td {
        padding: 15px;
        border-bottom: 1px solid var(--card-border);
        vertical-align: middle;
    }
    
    .price-table tr:last-child td {
        border-bottom: none;
    }
    
    .price-table tr:hover {
        background-color: var(--hover-bg);
    }
    
    .price-table .asset-name {
        display: flex;
        align-items: center;
    }
    
    .price-table .asset-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 10px;
    }
    
    .price-table .asset-icon img {
        width: 24px;
        height: 24px;
    }
    
    .price-table .asset-title {
        font-weight: 600;
        color: var(--text-primary);
    }
    
    .price-table .asset-subtitle {
        font-size: 0.85rem;
        color: var(--text-secondary);
    }
    
    .price-table .price-value {
        font-weight: 600;
        color: var(--text-primary);
    }
    
    .price-table .price-change {
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
        min-width: 80px;
        text-align: center;
    }
    
    .price-table .price-change.positive {
        background-color: rgba(0, 194, 111, 0.1);
        color: var(--accent-color);
    }
    
    .price-table .price-change.negative {
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
        color: #F7931A;
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
            <i class="fab fa-bitcoin"></i>
        </div>
        <div>
            <h1>قیمت ارزهای دیجیتال</h1>
            <p class="market-subtitle">آخرین قیمت‌های ارزهای دیجیتال در بازار</p>
        </div>
    </div>
    <button id="refresh-btn" class="refresh-btn">
        <i class="fas fa-sync-alt"></i> به‌روزرسانی
    </button>
</div>

<!-- کارت‌های قیمت ارزهای دیجیتال -->
<div class="row">
    <!-- بیت کوین -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card" id="bitcoin-card">
            <div class="card-icon" style="background-color: rgba(247, 147, 26, 0.1);">
                <img src="https://cryptologos.cc/logos/bitcoin-btc-logo.png" alt="Bitcoin">
            </div>
            <div class="title">بیت کوین</div>
            <div class="subtitle">BTC</div>
            <div class="price" id="bitcoin-price">{{ number_format($cryptoData['bitcoin']['current'] ?? 65800) }} دلار</div>
            <div class="change {{ ($cryptoData['bitcoin']['change'] ?? 2.5) > 0 ? 'positive' : 'negative' }}" id="bitcoin-change">
                <i class="fas {{ ($cryptoData['bitcoin']['change'] ?? 2.5) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $cryptoData['bitcoin']['change'] ?? 2.5 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value" id="bitcoin-low">{{ number_format($cryptoData['bitcoin']['low'] ?? 64500) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value" id="bitcoin-high">{{ number_format($cryptoData['bitcoin']['high'] ?? 66200) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: <span id="bitcoin-update-time">{{ $cryptoData['bitcoin']['updated_at'] ?? now()->format('H:i:s') }}</span>
            </div>
        </div>
    </div>

    <!-- اتریوم -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card">
            <div class="card-icon" style="background-color: rgba(114, 146, 172, 0.1);">
                <img src="https://cryptologos.cc/logos/ethereum-eth-logo.png" alt="Ethereum">
            </div>
            <div class="title">اتریوم</div>
            <div class="subtitle">ETH</div>
            <div class="price">{{ number_format($cryptoData['ethereum']['current'] ?? 3450) }} دلار</div>
            <div class="change {{ ($cryptoData['ethereum']['change'] ?? 1.8) > 0 ? 'positive' : 'negative' }}">
                <i class="fas {{ ($cryptoData['ethereum']['change'] ?? 1.8) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $cryptoData['ethereum']['change'] ?? 1.8 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value">{{ number_format($cryptoData['ethereum']['low'] ?? 3380) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value">{{ number_format($cryptoData['ethereum']['high'] ?? 3520) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: {{ $cryptoData['ethereum']['updated_at'] ?? now()->format('H:i:s') }}
            </div>
        </div>
    </div>
    
    <!-- تتر -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card" id="tether-card">
            <div class="card-icon" style="background-color: rgba(38, 161, 123, 0.1);">
                <img src="https://cryptologos.cc/logos/tether-usdt-logo.png" alt="Tether">
            </div>
            <div class="title">تتر</div>
            <div class="subtitle">USDT</div>
            <div class="price" id="tether-price">{{ number_format($cryptoData['tether']['current'] ?? 1.00, 2) }} دلار</div>
            <div class="change {{ ($cryptoData['tether']['change'] ?? 0.01) > 0 ? 'positive' : 'negative' }}" id="tether-change">
                <i class="fas {{ ($cryptoData['tether']['change'] ?? 0.01) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $cryptoData['tether']['change'] ?? 0.01 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value" id="tether-low">{{ number_format($cryptoData['tether']['low'] ?? 0.99, 2) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value" id="tether-high">{{ number_format($cryptoData['tether']['high'] ?? 1.01, 2) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: <span id="tether-update-time">{{ $cryptoData['tether']['updated_at'] ?? now()->format('H:i:s') }}</span>
            </div>
        </div>
    </div>
    
    <!-- بایننس کوین -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card">
            <div class="card-icon" style="background-color: rgba(243, 186, 47, 0.1);">
                <img src="https://cryptologos.cc/logos/binance-coin-bnb-logo.png" alt="Binance Coin">
            </div>
            <div class="title">بایننس کوین</div>
            <div class="subtitle">BNB</div>
            <div class="price">{{ number_format($cryptoData['binance']['current'] ?? 580) }} دلار</div>
            <div class="change {{ ($cryptoData['binance']['change'] ?? -0.7) > 0 ? 'positive' : 'negative' }}">
                <i class="fas {{ ($cryptoData['binance']['change'] ?? -0.7) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $cryptoData['binance']['change'] ?? -0.7 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value">{{ number_format($cryptoData['binance']['low'] ?? 575) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value">{{ number_format($cryptoData['binance']['high'] ?? 590) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: {{ $cryptoData['binance']['updated_at'] ?? now()->format('H:i:s') }}
            </div>
        </div>
    </div>
</div>

<!-- نمودار قیمت -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title"><i class="fas fa-chart-line"></i> نمودار قیمت بیت کوین</h3>
            </div>
            <div class="chart-container">
                <canvas id="cryptoChartCanvas"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- جدول قیمت‌ها -->
<div class="row">
    <div class="col-12">
        <div class="price-table-card">
            <div class="price-table-header">
                <h3 class="price-table-title"><i class="fas fa-list"></i> لیست قیمت‌های ارزهای دیجیتال</h3>
            </div>
            
            <div class="table-responsive">
                <table class="price-table">
                    <thead>
                        <tr>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>تغییر</th>
                            <th>کمترین</th>
                            <th>بیشترین</th>
                            <th>به‌روزرسانی</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon" style="background-color: rgba(247, 147, 26, 0.1);">
                                        <img src="https://cryptologos.cc/logos/bitcoin-btc-logo.png" alt="Bitcoin">
                                    </div>
                                    <div>
                                        <div class="asset-title">بیت کوین</div>
                                        <div class="asset-subtitle">BTC</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price-value">{{ number_format($cryptoData['bitcoin']['current'] ?? 65800) }} دلار</td>
                            <td>
                                <div class="price-change {{ ($cryptoData['bitcoin']['change'] ?? 2.5) > 0 ? 'positive' : 'negative' }}">
                                    {{ $cryptoData['bitcoin']['change'] ?? 2.5 }}%
                                </div>
                            </td>
                            <td>{{ number_format($cryptoData['bitcoin']['low'] ?? 64500) }}</td>
                            <td>{{ number_format($cryptoData['bitcoin']['high'] ?? 66200) }}</td>
                            <td>{{ $cryptoData['bitcoin']['updated_at'] ?? now()->format('H:i:s') }}</td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon" style="background-color: rgba(114, 146, 172, 0.1);">
                                        <img src="https://cryptologos.cc/logos/ethereum-eth-logo.png" alt="Ethereum">
                                    </div>
                                    <div>
                                        <div class="asset-title">اتریوم</div>
                                        <div class="asset-subtitle">ETH</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price-value">{{ number_format($cryptoData['ethereum']['current'] ?? 3450) }} دلار</td>
                            <td>
                                <div class="price-change {{ ($cryptoData['ethereum']['change'] ?? 1.8) > 0 ? 'positive' : 'negative' }}">
                                    {{ $cryptoData['ethereum']['change'] ?? 1.8 }}%
                                </div>
                            </td>
                            <td>{{ number_format($cryptoData['ethereum']['low'] ?? 3380) }}</td>
                            <td>{{ number_format($cryptoData['ethereum']['high'] ?? 3520) }}</td>
                            <td>{{ $cryptoData['ethereum']['updated_at'] ?? now()->format('H:i:s') }}</td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon" style="background-color: rgba(38, 161, 123, 0.1);">
                                        <img src="https://cryptologos.cc/logos/tether-usdt-logo.png" alt="Tether">
                                    </div>
                                    <div>
                                        <div class="asset-title">تتر</div>
                                        <div class="asset-subtitle">USDT</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price-value">{{ number_format($cryptoData['tether']['current'] ?? 1.00, 2) }} دلار</td>
                            <td>
                                <div class="price-change {{ ($cryptoData['tether']['change'] ?? 0.01) > 0 ? 'positive' : 'negative' }}">
                                    {{ $cryptoData['tether']['change'] ?? 0.01 }}%
                                </div>
                            </td>
                            <td>{{ number_format($cryptoData['tether']['low'] ?? 0.99, 2) }}</td>
                            <td>{{ number_format($cryptoData['tether']['high'] ?? 1.01, 2) }}</td>
                            <td>{{ $cryptoData['tether']['updated_at'] ?? now()->format('H:i:s') }}</td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon" style="background-color: rgba(243, 186, 47, 0.1);">
                                        <img src="https://cryptologos.cc/logos/binance-coin-bnb-logo.png" alt="Binance Coin">
                                    </div>
                                    <div>
                                        <div class="asset-title">بایننس کوین</div>
                                        <div class="asset-subtitle">BNB</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price-value">{{ number_format($cryptoData['binance']['current'] ?? 580) }} دلار</td>
                            <td>
                                <div class="price-change {{ ($cryptoData['binance']['change'] ?? -0.7) > 0 ? 'positive' : 'negative' }}">
                                    {{ $cryptoData['binance']['change'] ?? -0.7 }}%
                                </div>
                            </td>
                            <td>{{ number_format($cryptoData['binance']['low'] ?? 575) }}</td>
                            <td>{{ number_format($cryptoData['binance']['high'] ?? 590) }}</td>
                            <td>{{ $cryptoData['binance']['updated_at'] ?? now()->format('H:i:s') }}</td>
                        </tr>
                    </tbody>
                </table>
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
            fetch('/markets/crypto/latest-prices', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // به‌روزرسانی داده‌ها در صفحه
                updateCryptoPrices(data);
                
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
        
        // تابع به‌روزرسانی قیمت‌های ارزهای دیجیتال در صفحه
        function updateCryptoPrices(data) {
            // به‌روزرسانی بیت کوین
            if (data.bitcoin) {
                document.getElementById('bitcoin-price').innerText = numberFormat(data.bitcoin.current) + ' دلار';
                document.getElementById('bitcoin-change').innerHTML = 
                    `<i class="fas ${data.bitcoin.change > 0 ? 'fa-caret-up' : 'fa-caret-down'}"></i> ${data.bitcoin.change}%`;
                document.getElementById('bitcoin-change').className = 
                    `change ${data.bitcoin.change > 0 ? 'positive' : 'negative'}`;
                document.getElementById('bitcoin-low').innerText = numberFormat(data.bitcoin.low);
                document.getElementById('bitcoin-high').innerText = numberFormat(data.bitcoin.high);
                document.getElementById('bitcoin-update-time').innerText = data.bitcoin.updated_at;
            }
            
            // به‌روزرسانی تتر
            if (data.tether) {
                document.getElementById('tether-price').innerText = numberFormat(data.tether.current, 2) + ' دلار';
                document.getElementById('tether-change').innerHTML = 
                    `<i class="fas ${data.tether.change > 0 ? 'fa-caret-up' : 'fa-caret-down'}"></i> ${data.tether.change}%`;
                document.getElementById('tether-change').className = 
                    `change ${data.tether.change > 0 ? 'positive' : 'negative'}`;
                document.getElementById('tether-low').innerText = numberFormat(data.tether.low, 2);
                document.getElementById('tether-high').innerText = numberFormat(data.tether.high, 2);
                document.getElementById('tether-update-time').innerText = data.tether.updated_at;
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
        const ctx = document.getElementById('cryptoChartCanvas').getContext('2d');
        let cryptoChart;
        
        function initChart() {
            // دریافت داده‌های نمودار از سرور
            fetch('/markets/crypto/chart-data')
                .then(response => response.json())
                .then(chartData => {
                    cryptoChart = new Chart(ctx, {
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
                                            return numberFormat(value) + ' دلار';
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
            fetch('/markets/crypto/chart-data')
                .then(response => response.json())
                .then(chartData => {
                    if (cryptoChart) {
                        cryptoChart.data.labels = chartData.labels;
                        chartData.datasets.forEach((dataset, index) => {
                            if (index < cryptoChart.data.datasets.length) {
                                Object.assign(cryptoChart.data.datasets[index], dataset);
                            }
                        });
                        cryptoChart.update();
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