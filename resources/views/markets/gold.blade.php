@extends('layouts.app')

@section('title', 'قیمت طلا | داشبورد بازار')

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
        background-color: rgba(247, 147, 26, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }
    
    .price-card .card-icon i {
        font-size: 20px;
        color: #F7931A;
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
        background-color: rgba(247, 147, 26, 0.1);
    }
    
    .price-table .asset-icon i {
        font-size: 16px;
        color: #F7931A;
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
            <i class="fas fa-coins"></i>
        </div>
        <div>
            <h1>قیمت طلا</h1>
            <p class="market-subtitle">آخرین قیمت‌های طلا در بازار</p>
        </div>
    </div>
    <button id="refresh-btn" class="refresh-btn">
        <i class="fas fa-sync-alt"></i> به‌روزرسانی
    </button>
</div>

<!-- کارت‌های قیمت طلا -->
<div class="row">
    <!-- طلای 18 عیار -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card" id="gold-18-card">
            <div class="card-icon">
                <i class="fas fa-coins"></i>
            </div>
            <div class="title">طلای 18 عیار</div>
            <div class="subtitle">هر گرم</div>
            <div class="price" id="gold-18-price">{{ number_format($goldData['geram18']['current'] ?? 35800000) }} تومان</div>
            <div class="change {{ ($goldData['geram18']['change'] ?? 1.2) > 0 ? 'positive' : 'negative' }}" id="gold-18-change">
                <i class="fas {{ ($goldData['geram18']['change'] ?? 1.2) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $goldData['geram18']['change'] ?? 1.2 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value" id="gold-18-low">{{ number_format($goldData['geram18']['low'] ?? 35400000) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value" id="gold-18-high">{{ number_format($goldData['geram18']['high'] ?? 36000000) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: <span id="gold-18-update-time">{{ $goldData['geram18']['updated_at'] ?? now()->format('H:i:s') }}</span>
            </div>
        </div>
    </div>

    <!-- طلای 24 عیار -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card">
            <div class="card-icon">
                <i class="fas fa-coins"></i>
            </div>
            <div class="title">طلای 24 عیار</div>
            <div class="subtitle">هر گرم</div>
            <div class="price">{{ number_format($goldData['geram24']['current'] ?? 47700000) }} تومان</div>
            <div class="change {{ ($goldData['geram24']['change'] ?? 1.3) > 0 ? 'positive' : 'negative' }}">
                <i class="fas {{ ($goldData['geram24']['change'] ?? 1.3) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $goldData['geram24']['change'] ?? 1.3 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value">{{ number_format($goldData['geram24']['low'] ?? 47200000) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value">{{ number_format($goldData['geram24']['high'] ?? 48000000) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: {{ $goldData['geram24']['updated_at'] ?? now()->format('H:i:s') }}
            </div>
        </div>
    </div>
    
    <!-- انس جهانی -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card" id="ons-card">
            <div class="card-icon">
                <i class="fas fa-globe-americas"></i>
            </div>
            <div class="title">انس جهانی طلا</div>
            <div class="subtitle">اونس</div>
            <div class="price" id="ons-price">{{ number_format($goldData['ons']['current'] ?? 2120.50, 2) }} دلار</div>
            <div class="change {{ ($goldData['ons']['change'] ?? 0.8) > 0 ? 'positive' : 'negative' }}" id="ons-change">
                <i class="fas {{ ($goldData['ons']['change'] ?? 0.8) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $goldData['ons']['change'] ?? 0.8 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value" id="ons-low">{{ number_format($goldData['ons']['low'] ?? 2110.25, 2) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value" id="ons-high">{{ number_format($goldData['ons']['high'] ?? 2125.75, 2) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: <span id="ons-update-time">{{ $goldData['ons']['updated_at'] ?? now()->format('H:i:s') }}</span>
            </div>
        </div>
    </div>
    
    <!-- مثقال طلا -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card">
            <div class="card-icon">
                <i class="fas fa-balance-scale"></i>
            </div>
            <div class="title">مثقال طلا</div>
            <div class="subtitle">هر مثقال</div>
            <div class="price">{{ number_format($goldData['mesghal']['current'] ?? 155000000) }} تومان</div>
            <div class="change {{ ($goldData['mesghal']['change'] ?? 1.1) > 0 ? 'positive' : 'negative' }}">
                <i class="fas {{ ($goldData['mesghal']['change'] ?? 1.1) > 0 ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                {{ $goldData['mesghal']['change'] ?? 1.1 }}%
            </div>
            <div class="range">
                <div class="item">
                    <div class="label">پایین‌ترین</div>
                    <div class="value">{{ number_format($goldData['mesghal']['low'] ?? 153500000) }}</div>
                </div>
                <div class="item">
                    <div class="label">بالاترین</div>
                    <div class="value">{{ number_format($goldData['mesghal']['high'] ?? 156000000) }}</div>
                </div>
            </div>
            <div class="updated-time">
                به‌روزرسانی: {{ $goldData['mesghal']['updated_at'] ?? now()->format('H:i:s') }}
            </div>
        </div>
    </div>
</div>

<!-- نمودار قیمت -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title"><i class="fas fa-chart-line"></i> نمودار قیمت طلا</h3>
            </div>
            <div class="chart-container">
                <canvas id="goldChartCanvas"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- جدول قیمت‌ها -->
<div class="row">
    <div class="col-12">
        <div class="price-table-card">
            <div class="price-table-header">
                <h3 class="price-table-title"><i class="fas fa-list"></i> لیست قیمت‌های طلا و سکه</h3>
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
                                    <div class="asset-icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <div>
                                        <div class="asset-title">طلای 18 عیار</div>
                                        <div class="asset-subtitle">هر گرم</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price-value">{{ number_format($goldData['geram18']['current'] ?? 35800000) }} تومان</td>
                            <td>
                                <div class="price-change {{ ($goldData['geram18']['change'] ?? 1.2) > 0 ? 'positive' : 'negative' }}">
                                    {{ $goldData['geram18']['change'] ?? 1.2 }}%
                                </div>
                            </td>
                            <td>{{ number_format($goldData['geram18']['low'] ?? 35400000) }}</td>
                            <td>{{ number_format($goldData['geram18']['high'] ?? 36000000) }}</td>
                            <td>{{ $goldData['geram18']['updated_at'] ?? now()->format('H:i:s') }}</td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <div>
                                        <div class="asset-title">طلای 24 عیار</div>
                                        <div class="asset-subtitle">هر گرم</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price-value">{{ number_format($goldData['geram24']['current'] ?? 47700000) }} تومان</td>
                            <td>
                                <div class="price-change {{ ($goldData['geram24']['change'] ?? 1.3) > 0 ? 'positive' : 'negative' }}">
                                    {{ $goldData['geram24']['change'] ?? 1.3 }}%
                                </div>
                            </td>
                            <td>{{ number_format($goldData['geram24']['low'] ?? 47200000) }}</td>
                            <td>{{ number_format($goldData['geram24']['high'] ?? 48000000) }}</td>
                            <td>{{ $goldData['geram24']['updated_at'] ?? now()->format('H:i:s') }}</td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon">
                                        <i class="fas fa-globe-americas"></i>
                                    </div>
                                    <div>
                                        <div class="asset-title">انس جهانی</div>
                                        <div class="asset-subtitle">اونس</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price-value">{{ number_format($goldData['ons']['current'] ?? 2120.50, 2) }} دلار</td>
                            <td>
                                <div class="price-change {{ ($goldData['ons']['change'] ?? 0.8) > 0 ? 'positive' : 'negative' }}">
                                    {{ $goldData['ons']['change'] ?? 0.8 }}%
                                </div>
                            </td>
                            <td>{{ number_format($goldData['ons']['low'] ?? 2110.25, 2) }}</td>
                            <td>{{ number_format($goldData['ons']['high'] ?? 2125.75, 2) }}</td>
                            <td>{{ $goldData['ons']['updated_at'] ?? now()->format('H:i:s') }}</td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon">
                                        <i class="fas fa-balance-scale"></i>
                                    </div>
                                    <div>
                                        <div class="asset-title">مثقال طلا</div>
                                        <div class="asset-subtitle">هر مثقال</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price-value">{{ number_format($goldData['mesghal']['current'] ?? 155000000) }} تومان</td>
                            <td>
                                <div class="price-change {{ ($goldData['mesghal']['change'] ?? 1.1) > 0 ? 'positive' : 'negative' }}">
                                    {{ $goldData['mesghal']['change'] ?? 1.1 }}%
                                </div>
                            </td>
                            <td>{{ number_format($goldData['mesghal']['low'] ?? 153500000) }}</td>
                            <td>{{ number_format($goldData['mesghal']['high'] ?? 156000000) }}</td>
                            <td>{{ $goldData['mesghal']['updated_at'] ?? now()->format('H:i:s') }}</td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <div>
                                        <div class="asset-title">سکه امامی</div>
                                        <div class="asset-subtitle">هر عدد</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price-value">{{ number_format($goldData['coin_emami']['current'] ?? 230000000) }} تومان</td>
                            <td>
                                <div class="price-change {{ ($goldData['coin_emami']['change'] ?? 1.2) > 0 ? 'positive' : 'negative' }}">
                                    {{ $goldData['coin_emami']['change'] ?? 1.2 }}%
                                </div>
                            </td>
                            <td>{{ number_format($goldData['coin_emami']['low'] ?? 228000000) }}</td>
                            <td>{{ number_format($goldData['coin_emami']['high'] ?? 231000000) }}</td>
                            <td>{{ $goldData['coin_emami']['updated_at'] ?? now()->format('H:i:s') }}</td>
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
            fetch('/api/gold-prices/refresh', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // به‌روزرسانی داده‌ها در صفحه
                updateGoldPrices(data);
                
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
        
        // تابع به‌روزرسانی قیمت‌های طلا در صفحه
        function updateGoldPrices(data) {
            // به‌روزرسانی طلای 18 عیار
            if (data.geram18) {
                document.getElementById('gold-18-price').innerText = numberFormat(data.geram18.current) + ' تومان';
                document.getElementById('gold-18-change').innerHTML = 
                    `<i class="fas ${data.geram18.change > 0 ? 'fa-caret-up' : 'fa-caret-down'}"></i> ${data.geram18.change}%`;
                document.getElementById('gold-18-change').className = 
                    `change ${data.geram18.change > 0 ? 'positive' : 'negative'}`;
                document.getElementById('gold-18-low').innerText = numberFormat(data.geram18.low);
                document.getElementById('gold-18-high').innerText = numberFormat(data.geram18.high);
                document.getElementById('gold-18-update-time').innerText = data.geram18.updated_at;
            }
            
            // به‌روزرسانی انس جهانی
            if (data.ons) {
                document.getElementById('ons-price').innerText = numberFormat(data.ons.current, 2) + ' دلار';
                document.getElementById('ons-change').innerHTML = 
                    `<i class="fas ${data.ons.change > 0 ? 'fa-caret-up' : 'fa-caret-down'}"></i> ${data.ons.change}%`;
                document.getElementById('ons-change').className = 
                    `change ${data.ons.change > 0 ? 'positive' : 'negative'}`;
                document.getElementById('ons-low').innerText = numberFormat(data.ons.low, 2);
                document.getElementById('ons-high').innerText = numberFormat(data.ons.high, 2);
                document.getElementById('ons-update-time').innerText = data.ons.updated_at;
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
        
        // تابع نمایش اعلان
        function showNotification(message, type = 'info') {
            // اینجا می‌توانید از کتابخانه‌های نمایش اعلان استفاده کنید
            // مثال ساده:
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.innerText = message;
            document.body.appendChild(notification);
            
            // حذف اعلان بعد از چند ثانیه
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
        
        // راه‌اندازی نمودار
        const ctx = document.getElementById('goldChartCanvas').getContext('2d');
        let goldChart;
        
        function initChart() {
            // داده‌های نمونه برای نمودار
            const sampleData = {
                labels: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر'],
                datasets: [{
                    label: 'قیمت طلای 18 عیار (تومان)',
                    data: [32000000, 33500000, 34200000, 34800000, 35300000, 35600000, 35800000],
                    borderColor: '#F7931A',
                    backgroundColor: 'rgba(247, 147, 26, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            };
            
            goldChart = new Chart(ctx, {
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
                                    return numberFormat(value / 1000000) + ' میلیون';
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
        }
        
        function updateChart(data) {
            // به‌روزرسانی نمودار با داده‌های جدید
            if (goldChart && data.chart) {
                goldChart.data.labels = data.chart.labels;
                goldChart.data.datasets[0].data = data.chart.values;
                goldChart.update();
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
