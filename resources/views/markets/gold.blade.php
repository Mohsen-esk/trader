@extends('layouts.app')

@section('title', 'بازار طلا')

@section('styles')
<style>
    .market-header {
        margin-bottom: 30px;
    }
    
    .market-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }
    
    .market-title i {
        margin-left: 15px;
        color: #FFD700;
    }
    
    .market-subtitle {
        color: var(--text-secondary);
        margin-bottom: 20px;
    }
    
    .price-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .price-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .price-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    
    .price-title i {
        margin-left: 10px;
        color: #FFD700;
    }
    
    .price-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 10px;
    }
    
    .price-change {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-bottom: 15px;
    }
    
    .price-change.positive {
        background-color: rgba(0, 194, 111, 0.1);
        color: var(--accent-color);
    }
    
    .price-change.negative {
        background-color: rgba(234, 57, 67, 0.1);
        color: var(--danger-color);
    }
    
    .price-time {
        font-size: 0.85rem;
        color: var(--text-secondary);
    }
    
    .price-table {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 30px;
    }
    
    .price-table-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }
    
    .price-table-title i {
        margin-left: 10px;
        color: #FFD700;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    th, td {
        padding: 12px 15px;
        text-align: right;
    }
    
    th {
        background-color: var(--hover-bg);
        color: var(--text-primary);
        font-weight: 600;
    }
    
    td {
        color: var(--text-secondary);
        border-top: 1px solid var(--card-border);
    }
    
    tr:hover td {
        background-color: var(--hover-bg);
    }
    
    .chart-container {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 30px;
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
    }
    
    .chart-filters {
        display: flex;
        gap: 10px;
    }
    
    .chart-filter {
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        cursor: pointer;
        background-color: var(--hover-bg);
        color: var(--text-secondary);
        border: 1px solid var(--card-border);
        transition: all 0.3s ease;
    }
    
    .chart-filter.active {
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }
    
    .analysis-container {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 30px;
    }
    
    .analysis-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }
    
    .analysis-title i {
        margin-left: 10px;
        color: #FFD700;
    }
    
    .analysis-content {
        color: var(--text-secondary);
        line-height: 1.8;
    }
    
    .analysis-meta {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        color: var(--text-muted);
        font-size: 0.85rem;
    }
    
    .favorite-btn {
        display: inline-flex;
        align-items: center;
        padding: 8px 15px;
        border-radius: 8px;
        background-color: var(--hover-bg);
        color: var(--text-primary);
        border: 1px solid var(--card-border);
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }
    
    .favorite-btn i {
        margin-left: 8px;
        color: #FFC107;
    }
    
    .favorite-btn:hover {
        background-color: var(--card-border);
    }
</style>
@endsection

@section('content')
<!-- هدر بازار طلا -->
<div class="market-header">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="market-title">
            <i class="fas fa-coins"></i>
            بازار طلا
        </h1>
        <button class="favorite-btn">
            <i class="far fa-star"></i>
            افزودن به علاقه‌مندی‌ها
        </button>
    </div>
    <p class="market-subtitle">قیمت‌های لحظه‌ای طلا، سکه و مثقال طلا</p>
</div>

<!-- قیمت‌های اصلی -->
<div class="row mb-4">
    <!-- قیمت طلای 18 عیار -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card">
            <h3 class="price-title">
                <i class="fas fa-ring"></i>
                طلای 18 عیار
            </h3>
            <div class="price-value">2,850,000 تومان</div>
            <div class="price-change positive">
                <i class="fas fa-caret-up"></i>
                1.5%
            </div>
            <div class="price-time">آخرین به‌روزرسانی: 15:30</div>
        </div>
    </div>
    
    <!-- قیمت سکه امامی -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card">
            <h3 class="price-title">
                <i class="fas fa-coins"></i>
                سکه امامی
            </h3>
            <div class="price-value">29,500,000 تومان</div>
            <div class="price-change positive">
                <i class="fas fa-caret-up"></i>
                2.1%
            </div>
            <div class="price-time">آخرین به‌روزرسانی: 15:30</div>
        </div>
    </div>
    
    <!-- قیمت نیم سکه -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card">
            <h3 class="price-title">
                <i class="fas fa-coins"></i>
                نیم سکه
            </h3>
            <div class="price-value">16,800,000 تومان</div>
            <div class="price-change positive">
                <i class="fas fa-caret-up"></i>
                1.8%
            </div>
            <div class="price-time">آخرین به‌روزرسانی: 15:30</div>
        </div>
    </div>
    
    <!-- قیمت انس جهانی -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="price-card">
            <h3 class="price-title">
                <i class="fas fa-globe-americas"></i>
                انس جهانی
            </h3>
            <div class="price-value">2,380 دلار</div>
            <div class="price-change positive">
                <i class="fas fa-caret-up"></i>
                0.8%
            </div>
            <div class="price-time">آخرین به‌روزرسانی: 15:30</div>
        </div>
    </div>
</div>

<!-- نمودار قیمت طلا -->
<div class="chart-container">
    <div class="chart-header">
        <div class="chart-title">نمودار قیمت طلای 18 عیار</div>
        <div class="chart-filters">
            <div class="chart-filter active">روزانه</div>
            <div class="chart-filter">هفتگی</div>
            <div class="chart-filter">ماهانه</div>
            <div class="chart-filter">سالانه</div>
        </div>
    </div>
    <canvas id="goldChart" height="300"></canvas>
</div>

<!-- جدول قیمت‌ها -->
<div class="price-table">
    <h3 class="price-table-title">
        <i class="fas fa-table"></i>
        قیمت انواع طلا و سکه
    </h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>نوع</th>
                    <th>قیمت</th>
                    <th>تغییر روزانه</th>
                    <th>کمترین</th>
                    <th>بیشترین</th>
                    <th>زمان به‌روزرسانی</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>طلای 18 عیار</td>
                    <td>2,850,000 تومان</td>
                    <td class="text-success">+1.5%</td>
                    <td>2,800,000 تومان</td>
                    <td>2,860,000 تومان</td>
                    <td>15:30</td>
                </tr>
                <tr>
                    <td>طلای 24 عیار</td>
                    <td>3,800,000 تومان</td>
                    <td class="text-success">+1.6%</td>
                    <td>3,750,000 تومان</td>
                    <td>3,820,000 تومان</td>
                    <td>15:30</td>
                </tr>
                <tr>
                    <td>مثقال طلا</td>
                    <td>12,350,000 تومان</td>
                    <td class="text-success">+1.4%</td>
                    <td>12,200,000 تومان</td>
                    <td>12,400,000 تومان</td>
                    <td>15:30</td>
                </tr>
                <tr>
                    <td>سکه امامی</td>
                    <td>29,500,000 تومان</td>
                    <td class="text-success">+2.1%</td>
                    <td>29,000,000 تومان</td>
                    <td>29,600,000 تومان</td>
                    <td>15:30</td>
                </tr>
                <tr>
                    <td>سکه بهار آزادی</td>
                    <td>28,800,000 تومان</td>
                    <td class="text-success">+2.0%</td>
                    <td>28,400,000 تومان</td>
                    <td>29,000,000 تومان</td>
                    <td>15:30</td>
                </tr>
                <tr>
                    <td>نیم سکه</td>
                    <td>16,800,000 تومان</td>
                    <td class="text-success">+1.8%</td>
                    <td>16,500,000 تومان</td>
                    <td>16,900,000 تومان</td>
                    <td>15:30</td>
                </tr>
                <tr>
                    <td>ربع سکه</td>
                    <td>9,800,000 تومان</td>
                    <td class="text-success">+1.5%</td>
                    <td>9,600,000 تومان</td>
                    <td>9,850,000 تومان</td>
                    <td>15:30</td>
                </tr>
                <tr>
                    <td>سکه گرمی</td>
                    <td>5,200,000 تومان</td>
                    <td class="text-success">+1.0%</td>
                    <td>5,150,000 تومان</td>
                    <td>5,250,000 تومان</td>
                    <td>15:30</td>
                </tr>
                <tr>
                    <td>انس جهانی</td>
                    <td>2,380 دلار</td>
                    <td class="text-success">+0.8%</td>
                    <td>2,365 دلار</td>
                    <td>2,385 دلار</td>
                    <td>15:30</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- تحلیل بازار -->
<div class="analysis-container">
    <h3 class="analysis-title">
        <i class="fas fa-chart-bar"></i>
        تحلیل بازار طلا
    </h3>
    <div class="analysis-content">
        <p>قیمت طلا در بازارهای جهانی با افزایش تنش‌های ژئوپلیتیکی به بالاترین سطح خود در شش ماه گذشته رسید. این افزایش قیمت در بازار داخلی نیز تأثیرگذار بوده و باعث رشد قیمت انواع طلا و سکه شده است.</p>
        
        <p>عوامل مؤثر بر افزایش قیمت طلا در روزهای اخیر:</p>
        <ul>
            <li>افزایش تنش‌های ژئوپلیتیکی در خاورمیانه</li>
            <li>کاهش ارزش دلار در بازارهای جهانی</li>
            <li>افزایش تقاضا برای دارایی‌های امن در شرایط نااطمینانی اقتصادی</li>
            <li>افزایش نرخ تورم در اقتصادهای بزرگ جهان</li>
        </ul>
        
        <p>پیش‌بینی می‌شود با ادامه شرایط فعلی، قیمت طلا در کوتاه‌مدت روند صعودی خود را حفظ کند. با این حال، تصمیمات بانک‌های مرکزی در خصوص نرخ بهره می‌تواند بر روند قیمت طلا تأثیرگذار باشد.</p>
    </div>
    <div class="analysis-meta">
        <div>نویسنده: کارشناس اقتصادی</div>
        <div>تاریخ انتشار: 1404/02/27</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // نمودار قیمت طلا
        const ctx = document.getElementById('goldChart').getContext('2d');
        const goldChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'],
                datasets: [{
                    label: 'قیمت طلای 18 عیار (تومان)',
                    data: [2820000, 2830000, 2825000, 2835000, 2840000, 2845000, 2838000, 2850000, 2855000],
                    borderColor: '#FFD700',
                    backgroundColor: 'rgba(255, 215, 0, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += new Intl.NumberFormat('fa-IR').format(context.parsed.y) + ' تومان';
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--text-secondary')
                        }
                    },
                    y: {
                        beginAtZero: false,
                        grid: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--card-border')
                        },
                        ticks: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--text-secondary'),
                            callback: function(value) {
                                return new Intl.NumberFormat('fa-IR').format(value);
                            }
                        }
                    }
                }
            }
        });
        
        // فیلترهای نمودار
        const chartFilters = document.querySelectorAll('.chart-filter');
        chartFilters.forEach(filter => {
            filter.addEventListener('click', function() {
                chartFilters.forEach(f => f.classList.remove('active'));
                this.classList.add('active');
                
                // در اینجا می‌توانید داده‌های نمودار را بر اساس فیلتر انتخاب شده تغییر دهید
                let newData = [];
                
                switch(this.textContent) {
                    case 'روزانه':
                        newData = [2820000, 2830000, 2825000, 2835000, 2840000, 2845000, 2838000, 2850000, 2855000];
                        goldChart.data.labels = ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'];
                        break;
                    case 'هفتگی':
                        newData = [2800000, 2810000, 2820000, 2830000, 2840000, 2845000, 2850000];
                        goldChart.data.labels = ['شنبه', 'یکشنبه', 'دوشنبه', 'سه‌شنبه', 'چهارشنبه', 'پنج‌شنبه', 'جمعه'];
                        break;
                    case 'ماهانه':
                        newData = [2750000, 2780000, 2800000, 2820000, 2850000];
                        goldChart.data.labels = ['هفته 1', 'هفته 2', 'هفته 3', 'هفته 4', 'هفته 5'];
                        break;
                    case 'سالانه':
                        newData = [2200000, 2300000, 2400000, 2350000, 2450000, 2500000, 2600000, 2700000, 2650000, 2750000, 2800000, 2850000];
                        goldChart.data.labels = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
                        break;
                }
                
                goldChart.data.datasets[0].data = newData;
                goldChart.update();
            });
        });
        
        // دکمه علاقه‌مندی
        const favoriteBtn = document.querySelector('.favorite-btn');
        favoriteBtn.addEventListener('click', function() {
            const icon = this.querySelector('i');
            
            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                this.innerHTML = '<i class="fas fa-star"></i> حذف از علاقه‌مندی‌ها';
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                this.innerHTML = '<i class="far fa-star"></i> افزودن به علاقه‌مندی‌ها';
            }
        });
    });
</script>
@endsection