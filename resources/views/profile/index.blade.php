@extends('layouts.app')

@section('title', 'پروفایل کاربری')

@section('styles')
<style>
    /* استایل‌های پروفایل */
    .profile-header {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid var(--card-bg);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    
    .profile-name {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 5px;
    }
    
    .profile-email {
        color: var(--text-secondary);
        margin-bottom: 15px;
    }
    
    .profile-bio {
        color: var(--text-secondary);
        max-width: 500px;
        margin: 0 auto 20px;
        line-height: 1.6;
    }
    
    .profile-stats {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-bottom: 20px;
    }
    
    .profile-stat {
        text-align: center;
    }
    
    .profile-stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
    }
    
    .profile-stat-label {
        font-size: 0.9rem;
        color: var(--text-secondary);
    }
    
    .profile-actions {
        display: flex;
        gap: 10px;
    }
    
    .profile-action-btn {
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
    }
    
    .profile-action-btn i {
        margin-left: 8px;
    }
    
    .profile-action-btn.primary {
        background-color: var(--primary-color);
        color: white;
    }
    
    .profile-action-btn.primary:hover {
        background-color: #0069d9;
    }
    
    .profile-action-btn.secondary {
        background-color: var(--hover-bg);
        color: var(--text-primary);
        border: 1px solid var(--card-border);
    }
    
    .profile-action-btn.secondary:hover {
        background-color: var(--card-border);
    }
    
    /* کارت‌های پروفایل */
    .profile-section {
        margin-bottom: 30px;
    }
    
    .profile-section-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    
    .profile-section-title i {
        margin-left: 10px;
        color: var(--primary-color);
    }
    
    .profile-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .profile-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }
    
    .profile-card-title i {
        margin-left: 10px;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    
    .profile-card-content {
        color: var(--text-secondary);
    }
    
    .profile-card-action {
        margin-top: 15px;
        text-align: left;
    }
    
    .profile-card-link {
        color: var(--primary-color);
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
    }
    
    .profile-card-link i {
        margin-right: 5px;
    }
    
    /* تب‌های پروفایل */
    .profile-tabs {
        display: flex;
        overflow-x: auto;
        margin-bottom: 20px;
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 10px;
    }
    
    .profile-tab {
        padding: 10px 20px;
        border-radius: 8px;
        margin-left: 10px;
        cursor: pointer;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease;
        white-space: nowrap;
        text-decoration: none;
        display: flex;
        align-items: center;
    }
    
    .profile-tab i {
        margin-left: 8px;
    }
    
    .profile-tab.active {
        background-color: var(--primary-color);
        color: white;
    }
    
    .profile-tab:not(.active) {
        background-color: var(--hover-bg);
        color: var(--text-secondary);
    }
    
    .profile-tab:not(.active):hover {
        background-color: var(--card-border);
        color: var(--text-primary);
    }
    
    /* پیام‌های سیستمی */
    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    
    .alert-success {
        background-color: rgba(0, 194, 111, 0.1);
        border: 1px solid rgba(0, 194, 111, 0.2);
        color: var(--accent-color);
    }
    
    .alert-danger {
        background-color: rgba(234, 57, 67, 0.1);
        border: 1px solid rgba(234, 57, 67, 0.2);
        color: var(--danger-color);
    }
</style>
@endsection

@section('content')
<!-- پیام‌های سیستمی -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- هدر پروفایل -->
<div class="profile-header">
    <img src="{{ $user->avatar ? asset('storage/avatars/'.$user->avatar) : asset('images/default-avatar.png') }}" alt="{{ $user->name }}" class="profile-avatar">
    <h1 class="profile-name">{{ $user->name }}</h1>
    <p class="profile-email">{{ $user->email }}</p>
    
    @if($user->bio)
    <p class="profile-bio">{{ $user->bio }}</p>
    @endif
    
    <div class="profile-stats">
        <div class="profile-stat">
            <div class="profile-stat-value">{{ $user->created_at->diffInDays() }}</div>
            <div class="profile-stat-label">روز عضویت</div>
        </div>
        <div class="profile-stat">
            <div class="profile-stat-value">{{ $user->favorites_count ?? 0 }}</div>
            <div class="profile-stat-label">علاقه‌مندی‌ها</div>
        </div>
        <div class="profile-stat">
            <div class="profile-stat-value">{{ $user->activities_count ?? 0 }}</div>
            <div class="profile-stat-label">فعالیت‌ها</div>
        </div>
    </div>
    
    <div class="profile-actions">
        <a href="{{ route('profile.edit') }}" class="profile-action-btn primary">
            <i class="fas fa-user-edit"></i>
            ویرایش پروفایل
        </a>
        <a href="{{ route('profile.settings') }}" class="profile-action-btn secondary">
            <i class="fas fa-cog"></i>
            تنظیمات
        </a>
    </div>
</div>

<!-- تب‌های پروفایل -->
<div class="profile-tabs">
    <a href="{{ route('profile.index') }}" class="profile-tab active">
        <i class="fas fa-home"></i>
        خلاصه
    </a>
    <a href="{{ route('profile.favorites') }}" class="profile-tab">
        <i class="fas fa-star"></i>
        علاقه‌مندی‌ها
    </a>
    <a href="{{ route('profile.activities') }}" class="profile-tab">
        <i class="fas fa-history"></i>
        تاریخچه فعالیت‌ها
    </a>
    <a href="{{ route('profile.change-password') }}" class="profile-tab">
        <i class="fas fa-lock"></i>
        تغییر رمز عبور
    </a>
</div>

<!-- بخش‌های پروفایل -->
<div class="profile-section">
    <h2 class="profile-section-title">
        <i class="fas fa-tachometer-alt"></i>
        داشبورد کاربری
    </h2>
    
    <div class="row">
        <!-- کارت اطلاعات شخصی -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="profile-card">
                <h3 class="profile-card-title">
                    <i class="fas fa-user" style="background-color: rgba(0, 123, 255, 0.1); color: var(--primary-color);"></i>
                    اطلاعات شخصی
                </h3>
                <div class="profile-card-content">
                    <p><strong>نام:</strong> {{ $user->name }}</p>
                    <p><strong>ایمیل:</strong> {{ $user->email }}</p>
                    <p><strong>شماره تماس:</strong> {{ $user->phone ?? 'تنظیم نشده' }}</p>
                    <p><strong>تاریخ عضویت:</strong> {{ $user->created_at->format('Y/m/d') }}</p>
                </div>
                <div class="profile-card-action">
                    <a href="{{ route('profile.edit') }}" class="profile-card-link">
                        ویرایش <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- کارت علاقه‌مندی‌ها -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="profile-card">
                <h3 class="profile-card-title">
                    <i class="fas fa-star" style="background-color: rgba(255, 193, 7, 0.1); color: #FFC107;"></i>
                    علاقه‌مندی‌های اخیر
                </h3>
                <div class="profile-card-content">
                    @if(isset($user->favorites) && count($user->favorites) > 0)
                        <ul class="list-unstyled">
                            @foreach($user->favorites->take(3) as $favorite)
                                <li class="mb-2">{{ $favorite->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>شما هنوز هیچ موردی را به علاقه‌مندی‌ها اضافه نکرده‌اید.</p>
                    @endif
                </div>
                <div class="profile-card-action">
                    <a href="{{ route('profile.favorites') }}" class="profile-card-link">
                        مشاهده همه <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- کارت فعالیت‌های اخیر -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="profile-card">
                <h3 class="profile-card-title">
                    <i class="fas fa-history" style="background-color: rgba(76, 175, 80, 0.1); color: #4CAF50;"></i>
                    فعالیت‌های اخیر
                </h3>
                <div class="profile-card-content">
                    @if(isset($user->activities) && count($user->activities) > 0)
                        <ul class="list-unstyled">
                            @foreach($user->activities->take(3) as $activity)
                                <li class="mb-2">{{ $activity->description }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>هنوز هیچ فعالیتی ثبت نشده است.</p>
                    @endif
                </div>
                <div class="profile-card-action">
                    <a href="{{ route('profile.activities') }}" class="profile-card-link">
                        مشاهده همه <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- بخش تنظیمات سریع -->
<div class="profile-section">
    <h2 class="profile-section-title">
        <i class="fas fa-sliders-h"></i>
        تنظیمات سریع
    </h2>
    
    <div class="row">
        <!-- کارت تنظیمات حساب -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="profile-card">
                <h3 class="profile-card-title">
                    <i class="fas fa-cog" style="background-color: rgba(108, 117, 125, 0.1); color: #6c757d;"></i>
                    تنظیمات حساب
                </h3>
                <div class="profile-card-content">
                    <p>تغییر تنظیمات حساب کاربری، اعلان‌ها و ترجیحات شخصی</p>
                </div>
                <div class="profile-card-action">
                    <a href="{{ route('profile.settings') }}" class="profile-card-link">
                        تنظیمات <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- کارت امنیت -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="profile-card">
                <h3 class="profile-card-title">
                    <i class="fas fa-lock" style="background-color: rgba(220, 53, 69, 0.1); color: #dc3545;"></i>
                    امنیت حساب
                </h3>
                <div class="profile-card-content">
                    <p>تغییر رمز عبور و تنظیمات امنیتی حساب کاربری</p>
                </div>
                <div class="profile-card-action">
                    <a href="{{ route('profile.change-password') }}" class="profile-card-link">
                        تغییر رمز عبور <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection