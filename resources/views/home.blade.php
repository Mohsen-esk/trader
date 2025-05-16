@extends('layouts.app')

@section('title', 'داشبورد بازار | پلتفرم جامع بازارهای مالی')

@section('styles')
<style>
    /* استایل‌های مخصوص صفحه اصلی */
    .hero-section {
        background-color: var(--card-bg);
        border-radius: 15px;
        padding: 40px;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiPjxjaXJjbGUgY3g9IjIwIiBjeT0iMjAiIHI9IjEiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSwgMC4xKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==');
        opacity: 0.5;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--text-primary);
    }
    
    .hero-description {
        font-size: 1.2rem;
        color: var(--text-secondary);
        margin-bottom: 30px;
        max-width: 600px;
    }
    
    .hero-buttons {
        display: flex;
        gap: 15px;
    }
    
    .hero-image {
        position: absolute;
        top: 50%;
        left: 50px;
        transform: translateY(-50%);
        width: 400px;
        height: auto;
        z-index: 1;
    }
    
    @media (max-width: 992px) {
        .hero-image {
            position: static;
            width: 100%;
            max-width: 300px;
            margin: 30px auto 0;
            transform: none;
        }
    }
    
    /* کارت‌های قیمت */
    .market-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 25px;
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .market-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    
    .market-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .market-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
    }
    
    .market-card-title i {
        margin-left: 10px;
        font-size: 1.1rem;
    }
    
    .market-card-price {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 10px;
    }
    
    .market-card-change {
        display: inline-flex;
        align-items: center;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }
    
    .market-card-change.positive {
        background-color: rgba(0, 194, 111, 0.1);
        color: var(--accent-color);
    }
    
    .market-card-change.negative {
        background-color: rgba(234, 57, 67, 0.1);
        color: var(--danger-color);
    }
    
    .market-card-change i {
        margin-left: 5px;
    }
    
    .market-card-footer {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid var(--card-border);
        display: flex;
        justify-content: space-between;
    }
    
    .market-card-range {
        text-align: center;
    }
    
    .market-card-range-label {
        font-size: 0.8rem;
        color: var(--text-secondary);
        margin-bottom: 5px;
    }
    
    .market-card-range-value {
        font-size: 0.95rem;
        color: var(--text-primary);
        font-weight: 500;
    }
    
    /* جدول بازار */
    .market-table-container {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 25px;
    }
    
    .market-table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--card-border);
    }
    
    .market-table-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-primary);
    }
    
    .market-table-filters {
        display: flex;
        gap: 10px;
    }
    
    .market-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .market-table th {
        color: var(--text-secondary);
        font-weight: 500;
        padding: 12px 15px;
        text-align: right;
        border-bottom: 1px solid var(--card-border);
    }
    
    .market-table td {
        padding: 15px;
        border-bottom: 1px solid var(--card-border);
        vertical-align: middle;
    }
    
    .market-table tr:last-child td {
        border-bottom: none;
    }
    
    .market-table tr:hover {
        background-color: var(--hover-bg);
    }
    
    .market-table .asset-name {
        display: flex;
        align-items: center;
    }
    
    .market-table .asset-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 10px;
        background-color: var(--hover-bg);
    }
    
    .market-table .asset-icon i {
        font-size: 16px;
    }
    
    .market-table .asset-title {
        font-weight: 600;
        color: var(--text-primary);
    }
    
    .market-table .asset-subtitle {
        font-size: 0.85rem;
        color: var(--text-secondary);
    }
    
    .market-table .price {
        font-weight: 600;
        color: var(--text-primary);
    }
    
    .market-table .change {
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
        min-width: 80px;
        text-align: center;
    }
    
    .market-table .change.positive {
        background-color: rgba(0, 194, 111, 0.1);
        color: var(--accent-color);
    }
    
    .market-table .change.negative {
        background-color: rgba(234, 57, 67, 0.1);
        color: var(--danger-color);
    }
    
    /* بخش ویژگی‌ها */
    .features-section {
        padding: 60px 0;
    }
    
    .features-title {
        text-align: center;
        margin-bottom: 50px;
    }
    
    .features-title h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 15px;
    }
    
    .features-title p {
        font-size: 1.1rem;
        color: var(--text-secondary);
        max-width: 700px;
        margin: 0 auto;
    }
    
    .feature-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 25px;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background-color: rgba(56, 97, 251, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }
    
    .feature-icon i {
        font-size: 24px;
        color: var(--primary-color);
    }
    
    .feature-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 15px;
    }
    
    .feature-description {
        font-size: 0.95rem;
        color: var(--text-secondary);
        line-height: 1.6;
    }
    
    /* بخش آمار */
    .stats-section {
        background-color: var(--card-bg);
        border-radius: 15px;
        padding: 40px;
        margin: 60px 0;
        position: relative;
        overflow: hidden;
    }
    
    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiPjxjaXJjbGUgY3g9IjIwIiBjeT0iMjAiIHI9IjEiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSwgMC4xKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==');
        opacity: 0.5;
    }
    
    .stat-item {
        text-align: center;
        position: relative;
        z-index: 2;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 10px;
    }
    
    .stat-label {
        font-size: 1rem;
        color: var(--text-secondary);
    }
    
    /* بخش CTA */
    .cta-section {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 15px;
        padding: 60px 40px;
        margin: 60px 0;
        position: relative;
        overflow: hidden;
        color: white;
    }
    
    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiPjxjaXJjbGUgY3g9IjIwIiBjeT0iMjAiIHI9IjEiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSwgMC4yKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==');
        opacity: 0.5;
    }
    
    .cta-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }
    
    .cta-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    
    .cta-description {
        font-size: 1.1rem;
        margin-bottom: 30px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        opacity: 0.9;
    }
    
    .cta-button {
        background-color: white;
        color: var(--primary-color);
        border: none;
        padding: 12px 30px;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .cta-button:hover {
        background-color: rgba(255, 255, 255, 0.9);
        transform: translateY(-3px);
    }
    
    /* بخش اخبار */
    .news-section {
        padding: 60px 0;
    }
    
    .news-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }
    
    .news-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
    }
    
    .news-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    
    .news-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 15px;
        line-height: 1.5;
    }
    
    .news-card-meta {
        display: flex;
        justify-content: space-between;
        color: var(--text-secondary);
        font-size: 0.85rem;
        margin-bottom: 15px;
    }
    
    .news-card-description {
        color: var(--text-secondary);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    
    .news-card-link {
        color: var(--primary-color);
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }
    
    .news-card-link i {
        margin-right: 5px;
        transition: transform 0.3s ease;
    }
    
    .news-card-link:hover i {
        transform: translateX(3px);
    }
    
    /* بخش دانلود */
    .download-section {
        background-color: var(--card-bg);
        border-radius: 15px;
        padding: 60px 40px;
        margin: 60px 0;
        position: relative;
        overflow: hidden;
    }
    
    .download-content {
        position: relative;
        z-index: 2;
    }
    
    .download-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 20px;
    }
    
    .download-description {
        font-size: 1.1rem;
        color: var(--text-secondary);
        margin-bottom: 30px;
        max-width: 500px;
    }
    
    .download-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .download-button {
        display: flex;
        align-items: center;
        background-color: var(--hover-bg);
        border: 1px solid var(--card-border);
        border-radius: 10px;
        padding: 12px 20px;
        color: var(--text-primary);
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .download-button:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-3px);
    }
    
    .download-button i {
        font-size: 24px;
        margin-left: 15px;
    }
    
    .download-button-text {
        text-align: right;
    }
    
    .download-button-label {
        font-size: 0.8rem;
        margin-bottom: 3px;
    }
    
    .download-button-store {
        font-size: 1rem;
        font-weight: 600;
    }
    
    .download-image {
        max-width: 100%;
        height: auto;
    }
    
    @media (max-width: 768px) {
        .download-image {
            margin-top: 30px;
        }
    }
</style>
@endsection

@section('content')
<!-- بخش هیرو -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="hero-title">پلتفرم جامع بازارهای مالی ایران</h1>
                    <p class="hero-description">با داشبورد بازار، قیمت‌های لحظه‌ای، تحلیل‌های تخصصی و اخبار مهم بازارهای مالی را در یک مکان دنبال کنید.</p>
                    <div class="hero-buttons">
                        <a href="/markets" class="btn btn-primary">مشاهده بازارها</a>
                        <a href="/register" class="btn btn-outline">ثبت نام رایگان</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/hero-image.png') }}" alt="داشبورد بازار" class="hero-image" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'400\' height=\'300\'><rect width=\'400\' height=\'300\' fill=\'%23171B26\'/><path d=\'M50,150 L150,50 L250,150 L350,75\' stroke=\'%233861FB\' stroke-width=\'8\' fill=\'none\'/><circle cx=\'50\' cy=\'150\' r=\'10\' fill=\'%2300C26F\'/><circle cx=\'150\' cy=\'50\' r=\'10\' fill=\'%2300C26F\'/><circle cx=\'250\' cy=\'150\' r=\'10\' fill=\'%2300C26F\'/><circle cx=\'350\' cy=\'75\' r=\'10\' fill=\'%2300C26F\'/></svg>'">
            </div>
        </div>
    </div>
</section>

<!-- کارت‌های قیمت -->
<section class="market-cards">
    <div class="container">
        <div class="row">
            <!-- کارت دلار -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="market-card">
                    <div class="market-card-header">
                        <div class="market-card-title">
                            <i class="fas fa-dollar-sign"></i>
                            دلار آمریکا
                        </div>
                    </div>
                    <div class="market-card-price">{{ number_format(84500) }} تومان</div>
                    <div class="market-card-change positive">
                        <i class="fas fa-caret-up"></i>
                        0.8%
                    </div>
                    <div class="market-card-footer">
                        <div class="market-card-range">
                            <div class="market-card-range-label">کمترین</div>
                            <div class="market-card-range-value">{{ number_format(83800) }}</div>
                        </div>
                        <div class="market-card-range">
                            <div class="market-card-range-label">بیشترین</div>
                            <div class="market-card-range-value">{{ number_format(84700) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- کارت طلا -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="market-card">
                    <div class="market-card-header">
                        <div class="market-card-title">
                            <i class="fas fa-coins"></i>
                            طلای 18 عیار
                        </div>
                    </div>
                    <div class="market-card-price">{{ number_format(35800000) }} تومان</div>
                    <div class="market-card-change positive">
                        <i class="fas fa-caret-up"></i>
                        1.2%
                    </div>
                    <div class="market-card-footer">
                        <div class="market-card-range">
                            <div class="market-card-range-label">کمترین</div>
                            <div class="market-card-range-value">{{ number_format(35400000) }}</div>
                        </div>
                        <div class="market-card-range">
                            <div class="market-card-range-label">بیشترین</div>
                            <div class="market-card-range-value">{{ number_format(36000000) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- کارت بیت‌کوین -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="market-card">
                    <div class="market-card-header">
                        <div class="market-card-title">
                            <i class="fab fa-bitcoin"></i>
                            بیت‌کوین
                        </div>
                    </div>
                    <div class="market-card-price">{{ number_format(64200) }} دلار</div>
                    <div class="market-card-change positive">
                        <i class="fas fa-caret-up"></i>
                        2.5%
                    </div>
                    <div class="market-card-footer">
                        <div class="market-card-range">
                            <div class="market-card-range-label">کمترین</div>
                            <div class="market-card-range-value">{{ number_format(62800) }}</div>
                        </div>
                        <div class="market-card-range">
                            <div class="market-card-range-label">بیشترین</div>
                            <div class="market-card-range-value">{{ number_format(64500) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- کارت شاخص بورس -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="market-card">
                    <div class="market-card-header">
                        <div class="market-card-title">
                            <i class="fas fa-chart-line"></i>
                            شاخص بورس
                        </div>
                    </div>
                    <div class="market-card-price">{{ number_format(2050000) }}</div>
                    <div class="market-card-change negative">
                        <i class="fas fa-caret-down"></i>
                        0.3%
                    </div>
                    <div class="market-card-footer">
                        <div class="market-card-range">
                            <div class="market-card-range-label">کمترین</div>
                            <div class="market-card-range-value">{{ number_format(2045000) }}</div>
                        </div>
                        <div class="market-card-range">
                            <div class="market-card-range-label">بیشترین</div>
                            <div class="market-card-range-value">{{ number_format(2060000) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- جدول بازار -->
<section class="market-table-section">
    <div class="container">
        <div class="market-table-container">
            <div class="market-table-header">
                <h2 class="market-table-title">قیمت‌های بازار</h2>
                <div class="market-table-filters">
                    <button class="btn btn-sm btn-outline market-filter active" data-filter="all">همه</button>
                    <button class="btn btn-sm btn-outline market-filter" data-filter="currency">ارز</button>
                    <button class="btn btn-sm btn-outline market-filter" data-filter="gold">طلا و سکه</button>
                    <button class="btn btn-sm btn-outline market-filter" data-filter="crypto">ارز دیجیتال</button>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="market-table">
                    <thead>
                        <tr>
                            <th>نام دارایی</th>
                            <th>قیمت</th>
                            <th>تغییر (24h)</th>
                            <th>نمودار</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- دلار -->
                        <tr class="market-row" data-category="currency">
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon" style="background-color: #26A17B;">
                                        <i class="fas fa-dollar-sign" style="color: white;"></i>
                                    </div>
                                    <div>
                                        <div class="asset-title">دلار آمریکا</div>
                                        <div class="asset-subtitle">USD</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price">{{ number_format(84500) }} تومان</td>
                            <td>
                                <div class="change positive">
                                    <i class="fas fa-caret-up"></i> 0.8%
                                </div>
                            </td>
                            <td>
                                <svg width="100" height="30" viewBox="0 0 100 30">
                                    <path d="M0,15 L10,12 L20,18 L30,15 L40,20 L50,10 L60,15 L70,13 L80,17 L90,9 L100,11" stroke="#00C26F" stroke-width="2" fill="none"/>
                                </svg>
                            </td>
                            <td>
                                <a href="/markets/currency" class="btn btn-sm btn-outline">نمایش</a>
                            </td>
                        </tr>
                        
                        <!-- یورو -->
                        <tr class="market-row" data-category="currency">
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon" style="background-color: #26A17B;">
                                        <i class="fas fa-euro-sign" style="color: white;"></i>
                                    </div>
                                    <div>
                                        <div class="asset-title">یورو</div>
                                        <div class="asset-subtitle">EUR</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price">{{ number_format(91200) }} تومان</td>
                            <td>
                                <div class="change positive">
                                    <i class="fas fa-caret-up"></i> 0.5%
                                </div>
                            </td>
                            <td>
                                <svg width="100" height="30" viewBox="0 0 100 30">
                                    <path d="M0,15 L10,13 L20,17 L30,14 L40,16 L50,12 L60,15 L70,10 L80,14 L90,12 L100,8" stroke="#00C26F" stroke-width="2" fill="none"/>
                                </svg>
                            </td>
                            <td>
                                <a href="/markets/currency" class="btn btn-sm btn-outline">نمایش</a>
                            </td>
                        </tr>
                        
                        <!-- طلای 18 عیار -->
                        <tr class="market-row" data-category="gold">
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon" style="background-color: #F7931A;">
                                        <i class="fas fa-coins" style="color: white;"></i>
                                    </div>
                                    <div>
                                        <div class="asset-title">طلای 18 عیار</div>
                                        <div class="asset-subtitle">هر گرم</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price">{{ number_format(35800000) }} تومان</td>
                            <td>
                                <div class="change positive">
                                    <i class="fas fa-caret-up"></i> 1.2%
                                </div>
                            </td>
                            <td>
                                <svg width="100" height="30" viewBox="0 0 100 30">
                                    <path d="M0,20 L10,18 L20,15 L30,16 L40,12 L50,14 L60,10 L70,8 L80,12 L90,9 L100,5" stroke="#00C26F" stroke-width="2" fill="none"/>
                                </svg>
                            </td>
                            <td>
                                <a href="/markets/gold" class="btn btn-sm btn-outline">نمایش</a>
                            </td>
                        </tr>
                        
                        <!-- سکه امامی -->
                        <tr class="market-row" data-category="gold">
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon" style="background-color: #F7931A;">
                                        <i class="fas fa-coins" style="color: white;"></i>
                                    </div>
                                    <div>
                                        <div class="asset-title">سکه امامی</div>
                                        <div class="asset-subtitle">هر عدد</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price">{{ number_format(230000000) }} تومان</td>
                            <td>
                                <div class="change positive">
                                    <i class="fas fa-caret-up"></i> 1.2%
                                </div>
                            </td>
                            <td>
                                <svg width="100" height="30" viewBox="0 0 100 30">
                                    <path d="M0,18 L10,15 L20,16 L30,14 L40,12 L50,10 L60,13 L70,9 L80,11 L90,8 L100,5" stroke="#00C26F" stroke-width="2" fill="none"/>
                                </svg>
                            </td>
                            <td>
                                <a href="/markets/gold" class="btn btn-sm btn-outline">نمایش</a>
                            </td>
                        </tr>
                        
                        <!-- بیت‌کوین -->
                        <tr class="market-row" data-category="crypto">
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon" style="background-color: #F7931A;">
                                        <i class="fab fa-bitcoin" style="color: white;"></i>
                                    </div>
                                    <div>
                                        <div class="asset-title">بیت‌کوین</div>
                                        <div class="asset-subtitle">BTC</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price">{{ number_format(64200) }} دلار</td>
                            <td>
                                <div class="change positive">
                                    <i class="fas fa-caret-up"></i> 2.5%
                                </div>
                            </td>
                            <td>
                                <svg width="100" height="30" viewBox="0 0 100 30">
                                    <path d="M0,25 L10,22 L20,24 L30,20 L40,18 L50,15 L60,17 L70,12 L80,10 L90,8 L100,5" stroke="#00C26F" stroke-width="2" fill="none"/>
                                </svg>
                            </td>
                            <td>
                                <a href="/markets/crypto" class="btn btn-sm btn-outline">نمایش</a>
                            </td>
                        </tr>
                        
                        <!-- اتریوم -->
                        <tr class="market-row" data-category="crypto">
                            <td>
                                <div class="asset-name">
                                    <div class="asset-icon" style="background-color: #627EEA;">
                                        <i class="fab fa-ethereum" style="color: white;"></i>
                                    </div>
                                    <div>
                                        <div class="asset-title">اتریوم</div>
                                        <div class="asset-subtitle">ETH</div>
                                    </div>
                                </div>
                            </td>
                            <td class="price">{{ number_format(3200) }} دلار</td>
                            <td>
                                <div class="change positive">
                                    <i class="fas fa-caret-up"></i> 1.8%
                                </div>
                            </td>
                            <td>
                                <svg width="100" height="30" viewBox="0 0 100 30">
                                    <path d="M0,20 L10,18 L20,22 L30,17 L40,19 L50,15 L60,14 L70,10 L80,12 L90,8 L100,6" stroke="#00C26F" stroke-width="2" fill="none"/>
                                </svg>
                            </td>
                            <td>
                                <a href="/markets/crypto" class="btn btn-sm btn-outline">نمایش</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- بخش ویژگی‌ها -->
<section class="features-section">
    <div class="container">
        <div class="features-title">
            <h2>چرا داشبورد بازار؟</h2>
            <p>با امکانات متنوع ما، مدیریت و تحلیل بازارهای مالی را آسان‌تر از همیشه انجام دهید</p>
        </div>
        
        <div class="row">
            <!-- ویژگی 1 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="feature-title">قیمت‌های لحظه‌ای</h3>
                    <p class="feature-description">دسترسی به قیمت‌های لحظه‌ای بازارهای مختلف شامل ارز، طلا، سکه، بورس و ارزهای دیجیتال</p>
                </div>
            </div>
            
            <!-- ویژگی 2 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-search-dollar"></i>
                    </div>
                    <h3 class="feature-title">تحلیل تخصصی</h3>
                    <p class="feature-description">دسترسی به تحلیل‌های تخصصی و نمودارهای پیشرفته برای تصمیم‌گیری بهتر در بازارهای مالی</p>
                </div>
            </div>
            
            <!-- ویژگی 3 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h3 class="feature-title">هشدار قیمت</h3>
                    <p class="feature-description">تنظیم هشدارهای قیمتی برای اطلاع از تغییرات مهم بازار و فرصت‌های سرمایه‌گذاری</p>
                </div>
            </div>
            
            <!-- ویژگی 4 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <h3 class="feature-title">اخبار مالی</h3>
                    <p class="feature-description">دسترسی به آخرین اخبار و تحولات بازارهای مالی داخلی و بین‌المللی</p>
                </div>
            </div>
            
            <!-- ویژگی 5 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <h3 class="feature-title">مدیریت پرتفوی</h3>
                    <p class="feature-description">ابزارهای پیشرفته برای مدیریت و پیگیری پرتفوی سرمایه‌گذاری شما</p>
                </div>
            </div>
            
            <!-- ویژگی 6 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">دسترسی همه جا</h3>
                    <p class="feature-description">دسترسی به تمامی امکانات از طریق وب و اپلیکیشن موبایل در هر زمان و مکان</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- بخش آمار -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <div class="stat-number">+50,000</div>
                    <div class="stat-label">کاربر فعال</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <div class="stat-number">+100</div>
                    <div class="stat-label">بازار مالی</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">پشتیبانی</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <div class="stat-number">99.9%</div>
                    <div class="stat-label">دسترس‌پذیری</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- بخش CTA -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">همین امروز شروع کنید!</h2>
            <p class="cta-description">با ثبت نام رایگان، به جمع هزاران کاربری بپیوندید که از خدمات داشبورد بازار برای مدیریت سرمایه‌گذاری خود استفاده می‌کنند.</p>
            <a href="/register" class="cta-button">ثبت نام رایگان</a>
        </div>
    </div>
</section>

<!-- بخش اخبار -->
<section class="news-section">
    <div class="container">
        <div class="news-header">
            <h2 class="news-title">آخرین اخبار و تحلیل‌ها</h2>
            <a href="/news" class="btn btn-outline">مشاهده همه</a>
        </div>
        
        <div class="row">
            <!-- خبر 1 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="news-card">
                    <h3 class="news-card-title">تحلیل هفتگی بازار طلا: روند صعودی ادامه دارد</h3>
                    <div class="news-card-meta">
                        <span>19 اردیبهشت 1404</span>
                        <span>بازار طلا</span>
                    </div>
                    <p class="news-card-description">بررسی روند قیمت طلا در هفته گذشته و پیش‌بینی قیمت‌ها برای هفته آینده با توجه به عوامل موثر بر بازار...</p>
                    <a href="/news/1" class="news-card-link">
                        ادامه مطلب
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
            </div>
            
            <!-- خبر 2 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="news-card">
                    <h3 class="news-card-title">گزارش ماهانه بازار ارز: نوسانات دلار و یورو</h3>
                    <div class="news-card-meta">
                        <span>18 اردیبهشت 1404</span>
                        <span>بازار ارز</span>
                    </div>
                    <p class="news-card-description">بررسی وضعیت بازار ارز در ماه گذشته و تحلیل عوامل موثر بر نوسانات قیمت دلار و یورو در بازار...</p>
                    <a href="/news/2" class="news-card-link">
                        ادامه مطلب
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
            </div>
            
            <!-- خبر 3 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="news-card">
                    <h3 class="news-card-title">تحلیل تکنیکال بیت‌کوین: آیا صعود ادامه دارد؟</h3>
                    <div class="news-card-meta">
                        <span>17 اردیبهشت 1404</span>
                        <span>ارز دیجیتال</span>
                    </div>
                    <p class="news-card-description">بررسی نمودارهای تکنیکال بیت‌کوین و تحلیل روند قیمت در کوتاه‌مدت و بلندمدت با توجه به شاخص‌های مهم...</p>
                    <a href="/news/3" class="news-card-link">
                        ادامه مطلب
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- بخش دانلود اپلیکیشن -->
<section class="download-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="download-content">
                    <h2 class="download-title">اپلیکیشن موبایل داشبورد بازار</h2>
                    <p class="download-description">با نصب اپلیکیشن موبایل داشبورد بازار، همیشه و همه‌جا به اطلاعات لحظه‌ای بازارهای مالی دسترسی داشته باشید.</p>
                    <div class="download-buttons">
                        <a href="#" class="download-button">
                            <i class="fab fa-google-play"></i>
                            <div class="download-button-text">
                                <div class="download-button-label">دریافت از</div>
                                <div class="download-button-store">گوگل پلی</div>
                            </div>
                        </a>
                        <a href="#" class="download-button">
                            <i class="fab fa-apple"></i>
                            <div class="download-button-text">
                                <div class="download-button-label">دریافت از</div>
                                <div class="download-button-store">اپ استور</div>
                            </div>
                        </a>
                        <a href="#" class="download-button">
                            <i class="fas fa-coffee"></i>
                            <div class="download-button-text">
                                <div class="download-button-label">دریافت از</div>
                                <div class="download-button-store">کافه بازار</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/app-mockup.png') }}" alt="اپلیکیشن داشبورد بازار" class="download-image" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'300\' height=\'600\'><rect width=\'300\' height=\'600\' rx=\'30\' fill=\'%23171B26\'/><rect x=\'20\' y=\'60\' width=\'260\' height=\'480\' rx=\'10\' fill=\'%232A2E39\'/><circle cx=\'150\' cy=\'570\' r=\'20\' fill=\'%23222531\'/></svg>'">
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // فیلتر جدول بازار
    const marketFilters = document.querySelectorAll('.market-filter');
    const marketRows = document.querySelectorAll('.market-row');
    
    marketFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            // حذف کلاس active از همه فیلترها
            marketFilters.forEach(f => f.classList.remove('active'));
            
            // اضافه کردن کلاس active به فیلتر انتخاب شده
            this.classList.add('active');
            
            const category = this.dataset.filter;
            
            // نمایش/مخفی کردن ردیف‌ها بر اساس فیلتر
            marketRows.forEach(row => {
                if (category === 'all' || row.dataset.category === category) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection