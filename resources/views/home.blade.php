@extends('layouts.app')

@section('title', 'صفحه اصلی')

@section('styles')
<style>
    .hero-section {
        background-color: var(--card-bg);
        border-radius: 15px;
        padding: 40px;
        margin-bottom: 40px;
        border: 1px solid var(--card-border);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }
    
    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 15px;
    }
    
    .hero-subtitle {
        font-size: 1.2rem;
        color: var(--text-secondary);
        margin-bottom: 30px;
    }
    
    .hero-buttons {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .hero-btn {
        padding: 12px 25px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .hero-btn-primary {
        background-color: var(--primary-color);
        color: white;
        border: none;
    }
    
    .hero-btn-primary:hover {
        background-color: #0069d9;
        color: white;
    }
    
    .hero-btn-outline {
        background-color: transparent;
        color: var(--text-primary);
        border: 1px solid var(--card-border);
    }
    
    .hero-btn-outline:hover {
        background-color: var(--hover-bg);
        color: var(--primary-color);
    }
    
    .hero-image {
        width: 100%;
        max-width: 500px;
        height: auto;
        border-radius: 10px;
    }
    
    .market-overview {
        margin-bottom: 40px;
    }
    
    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 20px;
    }
    
    .market-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .market-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .market-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        color: white;
        font-size: 1.8rem;
    }
    
    .market-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 10px;
    }
    
    .market-description {
        color: var(--text-secondary);
        margin-bottom: 15px;
    }
    
    .market-price {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 5px;
    }
    
    .market-change {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 15px;
    }
    
    .market-change.positive {
        background-color: rgba(0, 194, 111, 0.1);
        color: var(--accent-color);
    }
    
    .market-change.negative {
        background-color: rgba(234, 57, 67, 0.1);
        color: var(--danger-color);
    }
    
    .market-link {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 8px;
        background-color: var(--primary-color);
        color: white;
        text-decoration: none;
        font-size: 1rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .market-link:hover {
        background-color: #0069d9;
        color: white;
    }
    
    .features-section {
        margin-bottom: 40px;
    }
    
    .feature-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 30px;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .feature-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        color: white;
        font-size: 2rem;
    }
    
    .feature-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 15px;
    }
    
    .feature-description {
        color: var(--text-secondary);
    }
    
    .news-section {
        margin-bottom: 40px;
    }
    
    .news-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .news-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    
    .news-content {
        padding: 20px;
    }
    
    .news-category {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-bottom: 10px;
        background-color: rgba(0, 123, 255, 0.1);
        color: var(--primary-color);
    }
    
    .news-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 10px;
    }
    
    .news-description {
        color: var(--text-secondary);
        font-size: 0.95rem;
        margin-bottom: 15px;
    }
    
    .news-date {
        color: var(--text-muted);
        font-size: 0.85rem;
        display: flex;
        align-items: center;
    }
    
    .news-date i {
        margin-left: 5px;
    }
    
    .cta-section {
        background-color: var(--primary-color);
        border-radius: 15px;
        padding: 50px;
        color: white;
        margin-bottom: 40px;
    }
    
    .cta-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    
    .cta-description {
        font-size: 1.1rem;
        margin-bottom: 30px;
        opacity: 0.9;
    }
    
    .cta-btn {
        padding: 12px 30px;
        border-radius: 8px;
        background-color: white;
        color: var(--primary-color);
        font-size: 1.1rem;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
    }
    
    .cta-btn:hover {
        background-color: rgba(255, 255, 255, 0.9);
        transform: translateY(-3px);
    }
    
    @media (max-width: 768px) {
        .hero-section {
            padding: 30px;
            text-align: center;
        }
        
        .hero-title {
            font-size: 2rem;
        }
        
        .hero-buttons {
            justify-content: center;
        }
        
        .hero-image {
            margin-top: 30px;
        }
        
        .cta-section {
            padding: 30px;
            text-align: center;
        }
    }
</style>
@endsection

@section('content')
<!-- بخش قهرمان -->
<section class="hero-section">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <h1 class="hero-title">مرجع قیمت‌های لحظه‌ای بازار</h1>
            <p class="hero-subtitle">قیمت‌های لحظه‌ای طلا، نقره، ارز دیجیتال و بورس را در یک نگاه ببینید و از تحلیل‌های کارشناسان بهره‌مند شوید.</p>
            <div class="hero-buttons">
                <a href="/dashboard" class="hero-btn hero-btn-primary">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    ورود به داشبورد
                </a>
                <a href="{{ route('markets.gold') }}" class="hero-btn hero-btn-outline">
                    <i class="fas fa-coins me-2"></i>
                    مشاهده بازارها
                </a>
            </div>
            <div class="d-flex align-items-center mt-4">
                <div class="d-flex align-items-center me-4">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    <span>قیمت‌های به‌روز</span>
                </div>
                <div class="d-flex align-items-center me-4">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    <span>تحلیل‌های تخصصی</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    <span>دسترسی آسان</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 text-center">
            <img src="{{ asset('images/hero-image.png') }}" alt="تصویر قهرمان" class="hero-image">
        </div>
    </div>
</section>

<!-- بخش بازارها -->
<section class="market-overview">
    <h2 class="section-title">بازارهای مهم</h2>
    <div class="row">
        <!-- کارت طلا -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="market-card">
                <div class="market-icon" style="background-color: #FFD700;">
                    <i class="fas fa-coins"></i>
                </div>
                <h3 class="market-title">بازار طلا</h3>
                <p class="market-description">قیمت‌های لحظه‌ای طلا و سکه</p>
                <div class="market-price">2,850,000 تومان</div>
                <div class="market-change positive">
                    <i class="fas fa-caret-up"></i>
                    +1.5%
                </div>
                <a href="{{ route('markets.gold') }}" class="market-link">مشاهده جزئیات</a>
            </div>
        </div>
        
        <!-- کارت نقره -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="market-card">
                <div class="market-icon" style="background-color: #C0C0C0;">
                    <i class="fas fa-medal"></i>
                </div>
                <h3 class="market-title">بازار نقره</h3>
                <p class="market-description">قیمت‌های لحظه‌ای نقره</p>
                <div class="market-price">25,800 تومان</div>
                <div class="market-change positive">
                    <i class="fas fa-caret-up"></i>
                    +1.2%
                </div>
                <a href="{{ route('markets.silver') }}" class="market-link">مشاهده جزئیات</a>
            </div>
        </div>
        
        <!-- کارت ارز دیجیتال -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="market-card">
                <div class="market-icon" style="background-color: #F7931A;">
                    <i class="fab fa-bitcoin"></i>
                </div>
                <h3 class="market-title">ارز دیجیتال</h3>
                <p class="market-description">قیمت‌های لحظه‌ای ارزهای دیجیتال</p>
                <div class="market-price">65,800 دلار</div>
                <div class="market-change positive">
                    <i class="fas fa-caret-up"></i>
                    +2.5%
                </div>
                <a href="{{ route('markets.crypto') }}" class="market-link">مشاهده جزئیات</a>
            </div>
        </div>
        
        <!-- کارت بورس -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="market-card">
                <div class="market-icon" style="background-color: #4CAF50;">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="market-title">بازار بورس</h3>
                <p class="market-description">شاخص‌های بورس و اوراق بهادار</p>
                <div class="market-price">2,150,000</div>
                <div class="market-change negative">
                    <i class="fas fa-caret-down"></i>
                    -0.5%
                </div>
                <a href="{{ route('markets.stocks') }}" class="market-link">مشاهده جزئیات</a>
            </div>
        </div>
    </div>
</section>

<!-- بخش ویژگی‌ها -->
<section class="features-section">
    <h2 class="section-title">چرا ما را انتخاب کنید؟</h2>
    <div class="row">
        <!-- ویژگی 1 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="feature-card">
                <div class="feature-icon" style="background-color: #007bff;">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">به‌روزرسانی لحظه‌ای</h3>
                <p class="feature-description">قیمت‌های بازارها به صورت لحظه‌ای به‌روزرسانی می‌شوند تا همیشه آخرین اطلاعات را در اختیار داشته باشید.</p>
            </div>
        </div>
        
        <!-- ویژگی 2 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="feature-card">
                <div class="feature-icon" style="background-color: #00c26f;">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3 class="feature-title">تحلیل‌های تخصصی</h3>
                <p class="feature-description">تحلیل‌های تخصصی کارشناسان ما به شما کمک می‌کند تا تصمیمات آگاهانه‌تری در بازارهای مالی بگیرید.</p>
            </div>
        </div>
        
        <!-- ویژگی 3 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="feature-card">
                <div class="feature-icon" style="background-color: #6f42c1;">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 class="feature-title">دسترسی در همه جا</h3>
                <p class="feature-description">با طراحی واکنش‌گرا، می‌توانید در هر زمان و هر مکان و با هر دستگاهی به اطلاعات بازارها دسترسی داشته باشید.</p>
            </div>
        </div>
    </div>
</section>

<!-- بخش اخبار -->
<section class="news-section">
    <h2 class="section-title">آخرین اخبار اقتصادی</h2>
    <div class="row">
        <!-- خبر 1 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="news-card">
                <img src="{{ asset('images/news1.jpg') }}" alt="خبر 1" class="news-image">
                <div class="news-content">
                    <span class="news-category">طلا</span>
                    <h3 class="news-title">افزایش قیمت طلا در بازارهای جهانی</h3>
                    <p class="news-description">قیمت طلا در بازارهای جهانی با افزایش 1.5 درصدی روبرو شد. کارشناسان دلیل این افزایش را...</p>
                    <div class="news-date">
                        <i class="far fa-calendar-alt"></i>
                        ۲۵ اردیبهشت ۱۴۰۴
                    </div>
                </div>
            </div>
        </div>
        
        <!-- خبر 2 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="news-card">
                <img src="{{ asset('images/news2.jpg') }}" alt="خبر 2" class="news-image">
                <div class="news-content">
                    <span class="news-category">ارز دیجیتال</span>
                    <h3 class="news-title">بیت کوین به مرز 70 هزار دلار نزدیک شد</h3>
                    <p class="news-description">بیت کوین در معاملات امروز با رشد چشمگیری به مرز 70 هزار دلار نزدیک شد. تحلیلگران معتقدند...</p>
                    <div class="news-date">
                        <i class="far fa-calendar-alt"></i>
                        ۲۴ اردیبهشت ۱۴۰۴
                    </div>
                </div>
            </div>
        </div>
        
        <!-- خبر 3 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="news-card">
                <img src="{{ asset('images/news3.jpg') }}" alt="خبر 3" class="news-image">
                <div class="news-content">
                    <span class="news-category">بورس</span>
                    <h3 class="news-title">شاخص کل بورس با کاهش روبرو شد</h3>
                    <p class="news-description">شاخص کل بورس اوراق بهادار تهران در معاملات امروز با کاهش 0.5 درصدی روبرو شد. دلیل این کاهش...</p>
                    <div class="news-date">
                        <i class="far fa-calendar-alt"></i>
                        ۲۳ اردیبهشت ۱۴۰۴
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- بخش دعوت به عمل -->
<section class="cta-section">
    <div class="row align-items-center">
        <div class="col-lg-8">
            <h2 class="cta-title">همین امروز به جمع کاربران ما بپیوندید!</h2>
            <p class="cta-description">با ثبت نام در سایت بازار، به اطلاعات لحظه‌ای بازارهای مالی، تحلیل‌های تخصصی و امکانات ویژه دسترسی پیدا کنید.</p>
        </div>
        <div class="col-lg-4 text-lg-end text-center mt-3 mt-lg-0">
            <a href="{{ route('register') }}" class="cta-btn">
                <i class="fas fa-user-plus me-2"></i>
                ثبت نام رایگان
            </a>
        </div>
        <a href="/register" class="cta-btn">
    <i class="fas fa-user-plus me-2"></i>
    ثبت نام رایگان
</a>
    </div>
</section>
@endsection