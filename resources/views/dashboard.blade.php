@extends('layouts.app')

@section('title', 'داشبورد کاربری')

@section('styles')
<style>
    .dashboard-header {
        margin-bottom: 30px;
    }
    
    .dashboard-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 10px;
    }
    
    .dashboard-subtitle {
        color: var(--text-secondary);
        margin-bottom: 20px;
    }
    
    .user-info-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
    }
    
    .user-avatar-large {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        margin-left: 20px;
        border: 3px solid var(--primary-color);
    }
    
    .user-details {
        flex: 1;
    }
    
    .user-name-large {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 5px;
    }
    
    .user-email {
        color: var(--text-secondary);
        margin-bottom: 10px;
    }
    
    .user-bio {
        color: var(--text-secondary);
        margin-bottom: 15px;
    }
    
    .user-stats {
        display: flex;
        gap: 20px;
    }
    
    .user-stat {
        display: flex;
        align-items: center;
    }
    
    .user-stat i {
        color: var(--primary-color);
        margin-left: 8px;
        font-size: 1.2rem;
    }
    
    .user-stat-text {
        color: var(--text-secondary);
    }
    
    .user-actions {
        display: flex;
        gap: 10px;
    }
    
    .user-action-btn {
        padding: 8px 15px;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .primary-btn {
        background-color: var(--primary-color);
        color: white;
        border: none;
    }
    
    .primary-btn:hover {
        background-color: #0069d9;
    }
    
    .outline-btn {
        background-color: transparent;
        color: var(--text-primary);
        border: 1px solid var(--card-border);
    }
    
    .outline-btn:hover {
        background-color: var(--hover-bg);
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
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        color: white;
        font-size: 1.5rem;
    }
    
    .market-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 10px;
    }
    
    .market-description {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-bottom: 15px;
    }
    
    .market-price {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 5px;
    }
    
    .market-change {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 0.8rem;
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
        padding: 8px 20px;
        border-radius: 8px;
        background-color: var(--primary-color);
        color: white;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .market-link:hover {
        background-color: #0069d9;
        color: white;
    }
    
    .section-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .section-title-link {
        font-size: 0.9rem;
        color: var(--primary-color);
        text-decoration: none;
    }
    
    .section-title-link i {
        margin-right: 5px;
    }
    
    .favorites-container {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 30px;
    }
    
    .favorites-list {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .favorite-item {
        background-color: var(--hover-bg);
        border-radius: 10px;
        padding: 15px;
        display: flex;
        align-items: center;
        width: 100%;
    }
    
    @media (min-width: 768px) {
        .favorite-item {
            width: calc(50% - 8px);
        }
    }
    
    @media (min-width: 992px) {
        .favorite-item {
            width: calc(33.333% - 10px);
        }
    }
    
    .favorite-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 15px;
        color: white;
        font-size: 1.2rem;
    }
    
    .favorite-details {
        flex: 1;
    }
    
    .favorite-name {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 5px;
    }
    
    .favorite-price {
        font-size: 0.95rem;
        font-weight: 500;
        color: var(--text-primary);
        margin-bottom: 5px;
    }
    
    .favorite-change {
        display: inline-block;
        padding: 2px 6px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .favorite-change.positive {
        background-color: rgba(0, 194, 111, 0.1);
        color: var(--accent-color);
    }
    
    .favorite-change.negative {
        background-color: rgba(234, 57, 67, 0.1);
        color: var(--danger-color);
    }
    
    .activities-container {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 30px;
    }
    
    .activities-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .activity-item {
        display: flex;
        align-items: flex-start;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--card-border);
    }
    
    .activity-item:last-child {
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--hover-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 15px;
        color: var(--primary-color);
        font-size: 1rem;
    }
    
    .activity-content {
        flex: 1;
    }
    
    .activity-description {
        color: var(--text-primary);
        font-size: 0.95rem;
        margin-bottom: 5px;
    }
    
    .activity-time {
        color: var(--text-secondary);
        font-size: 0.85rem;
    }
</style>
@endsection

@section('content')
<!-- هدر داشبورد -->
<div class="dashboard-header">
    <h1 class="dashboard-title">داشبورد کاربری</h1>
    <p class="dashboard-subtitle">خوش آمدید! در این صفحه می‌توانید اطلاعات حساب کاربری و علاقه‌مندی‌های خود را مشاهده کنید.</p>
</div>

<!-- کارت اطلاعات کاربر -->
<div class="user-info-card">
    <img src="{{ asset('images/default-avatar.png') }}" alt="{{ $user->name ?? 'کاربر' }}" class="user-avatar-large">
    <div class="user-details">
        <h2 class="user-name-large">{{ $user->name ?? 'کاربر' }}</h2>
        <div class="user-email">{{ $user->email ?? 'user@example.com' }}</div>
        <div class="user-bio">{{ $user->bio ?? 'بیوگرافی تنظیم نشده است.' }}</div>
        <div class="user-stats">
            <div class="user-stat">
                <i class="fas fa-calendar-alt"></i>
                <span class="user-stat-text">عضویت از: {{ isset($user->created_at) ? $user->created_at->format('Y/m/d') : '1404/01/01' }}</span>
            </div>
            <div class="user-stat">
                <i class="fas fa-star"></i>
                <span class="user-stat-text">علاقه‌مندی‌ها: {{ count($favorites ?? []) }}</span>
            </div>
            <div class="user-stat">
                <i class="fas fa-history"></i>
                <span class="user-stat-text">فعالیت‌ها: {{ count($activities ?? []) }}</span>
            </div>
        </div>
    </div>
    <div class="user-actions">
        <a href="{{ route('profile.edit') }}" class="user-action-btn outline-btn">
            <i class="fas fa-edit"></i>
            ویرایش پروفایل
        </a>
        <a href="{{ route('profile.settings') }}" class="user-action-btn primary-btn">
            <i class="fas fa-cog"></i>
            تنظیمات
        </a>
    </div>
</div>

<!-- علاقه‌مندی‌های کاربر -->
<div class="favorites-container">
    <h2 class="section-title">
        علاقه‌مندی‌های من
        <a href="{{ route('profile.favorites') }}" class="section-title-link">
            مشاهده همه
            <i class="fas fa-chevron-left"></i>
        </a>
    </h2>
    
    @if(isset($favorites) && count($favorites) > 0)
        <div class="favorites-list">
            @foreach($favorites as $favorite)
                <div class="favorite-item">
                    <div class="favorite-icon" style="background-color: {{ $favorite['color'] }}">
                        <i class="{{ $favorite['icon'] }}"></i>
                    </div>
                    <div class="favorite-details">
                        <div class="favorite-name">{{ $favorite['name'] }}</div>
                        <div class="favorite-price">{{ $favorite['price'] }}</div>
                        <div class="favorite-change {{ $favorite['status'] }}">
                            <i class="fas fa-caret-{{ $favorite['status'] == 'positive' ? 'up' : 'down' }}"></i>
                            {{ $favorite['change'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center p-4">
            <div class="mb-3">
                <i class="far fa-star fa-3x text-muted"></i>
            </div>
            <p>هنوز هیچ موردی به علاقه‌مندی‌ها اضافه نکرده‌اید.</p>
            <a href="{{ route('markets.gold') }}" class="btn btn-primary mt-2">مشاهده بازارها</a>
        </div>
    @endif
</div>

<!-- فعالیت‌های اخیر -->
<div class="activities-container">
    <h2 class="section-title">
        فعالیت‌های اخیر
        <a href="{{ route('profile.activities') }}" class="section-title-link">
            مشاهده همه
            <i class="fas fa-chevron-left"></i>
        </a>
    </h2>
    
    @if(isset($activities) && count($activities) > 0)
        <div class="activities-list">
            @foreach($activities as $activity)
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="{{ $activity['icon'] }}"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-description">{{ $activity['description'] }}</div>
                        <div class="activity-time">{{ $activity['time'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center p-4">
            <div class="mb-3">
                <i class="fas fa-history fa-3x text-muted"></i>
            </div>
            <p>هنوز هیچ فعالیتی ثبت نشده است.</p>
        </div>
    @endif
</div>

<!-- بازارهای مهم -->
<div class="row">
    <div class="col-12">
        <h2 class="section-title mb-4">بازارهای مهم</h2>
    </div>
    
    <!-- کارت طلا -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="market-card">
            <div class="market-icon" style="background-color: #FFD700;">
                <i class="fas fa-coins"></i>
            </div>
            <h3 class="market-title">بازار طلا</h3>
            <p class="market-description">قیمت‌های لحظه‌ای طلا و سکه</p>
            <div class="market-price">{{ $marketData['gold']['price'] ?? '2,850,000' }} {{ $marketData['gold']['unit'] ?? 'تومان' }}</div>
            <div class="market-change {{ $marketData['gold']['status'] ?? 'positive' }}">
                <i class="fas fa-caret-{{ isset($marketData['gold']['status']) && $marketData['gold']['status'] == 'positive' ? 'up' : 'down' }}"></i>
                {{ $marketData['gold']['change'] ?? '+1.5%' }}
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
            <div class="market-price">{{ $marketData['silver']['price'] ?? '25,800' }} {{ $marketData['silver']['unit'] ?? 'تومان' }}</div>
            <div class="market-change {{ $marketData['silver']['status'] ?? 'positive' }}">
                <i class="fas fa-caret-{{ isset($marketData['silver']['status']) && $marketData['silver']['status'] == 'positive' ? 'up' : 'down' }}"></i>
                {{ $marketData['silver']['change'] ?? '+1.2%' }}
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
            <div class="market-price">{{ $marketData['bitcoin']['price'] ?? '65,800' }} {{ $marketData['bitcoin']['unit'] ?? 'دلار' }}</div>
            <div class="market-change {{ $marketData['bitcoin']['status'] ?? 'positive' }}">
                <i class="fas fa-caret-{{ isset($marketData['bitcoin']['status']) && $marketData['bitcoin']['status'] == 'positive' ? 'up' : 'down' }}"></i>
                {{ $marketData['bitcoin']['change'] ?? '+2.5%' }}
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
            <div class="market-price">{{ $marketData['stocks']['price'] ?? '2,150,000' }} {{ $marketData['stocks']['unit'] ?? '' }}</div>
            <div class="market-change {{ $marketData['stocks']['status'] ?? 'negative' }}">
                <i class="fas fa-caret-{{ isset($marketData['stocks']['status']) && $marketData['stocks']['status'] == 'positive' ? 'up' : 'down' }}"></i>
                {{ $marketData['stocks']['change'] ?? '-0.5%' }}
            </div>
            <a href="{{ route('markets.stocks') }}" class="market-link">مشاهده جزئیات</a>
        </div>
    </div>
</div>
@endsection