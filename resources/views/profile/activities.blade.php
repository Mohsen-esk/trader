@extends('layouts.app')

@section('title', 'تاریخچه فعالیت‌ها')

@section('styles')
<style>
    .profile-content-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
    }
    
    .profile-content-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }
    
    .profile-content-title i {
        margin-left: 10px;
        color: var(--primary-color);
    }
    
    .activities-empty {
        text-align: center;
        padding: 40px 0;
    }
    
    .activities-empty-icon {
        font-size: 3rem;
        color: var(--text-secondary);
        margin-bottom: 20px;
    }
    
    .activities-empty-text {
        color: var(--text-secondary);
        font-size: 1.1rem;
        margin-bottom: 20px;
    }
    
    .activity-timeline {
        position: relative;
        padding-right: 30px;
    }
    
    .activity-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        right: 9px;
        width: 2px;
        background-color: var(--card-border);
    }
    
    .activity-item {
        position: relative;
        padding-bottom: 25px;
    }
    
    .activity-item:last-child {
        padding-bottom: 0;
    }
    
    .activity-icon {
        position: absolute;
        right: -30px;
        top: 0;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.7rem;
        z-index: 1;
    }
    
    .activity-content {
        background-color: var(--hover-bg);
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 5px;
    }
    
    .activity-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 5px;
    }
    
    .activity-description {
        font-size: 0.9rem;
        color: var(--text-secondary);
    }
    
    .activity-time {
        font-size: 0.8rem;
        color: var(--text-muted);
    }
    
    .activity-item.login .activity-icon {
        background-color: #4CAF50;
    }
    
    .activity-item.view .activity-icon {
        background-color: #2196F3;
    }
    
    .activity-item.favorite .activity-icon {
        background-color: #FFC107;
    }
    
    .activity-item.settings .activity-icon {
        background-color: #9C27B0;
    }
    
    /* تب‌های پروفایل */
    .profile-tabs {
        display: flex;
        overflow-x: auto;
        margin-bottom: 20px;
        background-color: var(--card-bg);
        border: 1px soli
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
    
    /* فیلترها */
    .activity-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }
    
    .activity-filter {
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        background-color: var(--hover-bg);
        color: var(--text-secondary);
        border: 1px solid var(--card-border);
    }
    
    .activity-filter.active {
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }
    
    .activity-filter:hover:not(.active) {
        background-color: var(--card-border);
        color: var(--text-primary);
    }
</style>
@endsection

@section('content')
<!-- تب‌های پروفایل -->
<div class="profile-tabs">
    <a href="{{ route('profile.index') }}" class="profile-tab">
        <i class="fas fa-home"></i>
        خلاصه
    </a>
    <a href="{{ route('profile.favorites') }}" class="profile-tab">
        <i class="fas fa-star"></i>
        علاقه‌مندی‌ها
    </a>
    <a href="{{ route('profile.activities') }}" class="profile-tab active">
        <i class="fas fa-history"></i>
        تاریخچه فعالیت‌ها
    </a>
    <a href="{{ route('profile.change-password') }}" class="profile-tab">
        <i class="fas fa-lock"></i>
        تغییر رمز عبور
    </a>
</div>

<div class="profile-content-card">
    <h1 class="profile-content-title">
        <i class="fas fa-history"></i>
        تاریخچه فعالیت‌ها
    </h1>
    
    <!-- فیلترهای فعالیت -->
    <div class="activity-filters">
        <div class="activity-filter active" data-filter="all">همه</div>
        <div class="activity-filter" data-filter="login">ورود به سیستم</div>
        <div class="activity-filter" data-filter="view">بازدیدها</div>
        <div class="activity-filter" data-filter="favorite">علاقه‌مندی‌ها</div>
        <div class="activity-filter" data-filter="settings">تنظیمات</div>
    </div>
    
    @if(empty($activities) || count($activities) == 0)
        <div class="activities-empty">
            <div class="activities-empty-icon">
                <i class="fas fa-history"></i>
            </div>
            <div class="activities-empty-text">
                هنوز هیچ فعالیتی ثبت نشده است.
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                بازگشت به داشبورد
            </a>
        </div>
    @else
        <div class="activity-timeline">
            <!-- نمونه فعالیت - ورود به سیستم -->
            <div class="activity-item login" data-category="login">
                <div class="activity-icon">
                    <i class="fas fa-sign-in-alt"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">ورود به سیستم</div>
                    <div class="activity-description">شما از مرورگر Chrome و سیستم‌عامل Windows وارد سیستم شدید.</div>
                </div>
                <div class="activity-time">امروز - 10:30</div>
            </div>
            
            <!-- نمونه فعالیت - بازدید -->
            <div class="activity-item view" data-category="view">
                <div class="activity-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">بازدید از صفحه طلا</div>
                    <div class="activity-description">شما از صفحه قیمت‌های طلا بازدید کردید.</div>
                </div>
                <div class="activity-time">امروز - 09:45</div>
            </div>
            
            <!-- نمونه فعالیت - علاقه‌مندی -->
            <div class="activity-item favorite" data-category="favorite">
                <div class="activity-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">افزودن به علاقه‌مندی‌ها</div>
                    <div class="activity-description">شما بیت کوین را به علاقه‌مندی‌های خود اضافه کردید.</div>
                </div>
                <div class="activity-time">دیروز - 15:20</div>
            </div>
            
            <!-- نمونه فعالیت - تغییر تنظیمات -->
            <div class="activity-item settings" data-category="settings">
                <div class="activity-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">تغییر تنظیمات</div>
                    <div class="activity-description">شما تنظیمات اعلان‌های خود را تغییر دادید.</div>
                </div>
                <div class="activity-time">دیروز - 14:10</div>
            </div>
            
            <!-- نمونه فعالیت - ورود به سیستم -->
            <div class="activity-item login" data-category="login">
                <div class="activity-icon">
                    <i class="fas fa-sign-in-alt"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">ورود به سیستم</div>
                    <div class="activity-description">شما از مرورگر Firefox و سیستم‌عامل Linux وارد سیستم شدید.</div>
                </div>
                <div class="activity-time">2 روز پیش - 08:30</div>
            </div>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // فیلتر کردن فعالیت‌ها
        const filterButtons = document.querySelectorAll('.activity-filter');
        const activityItems = document.querySelectorAll('.activity-item');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // فعال کردن دکمه فیلتر
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                const filter = this.getAttribute('data-filter');
                
                // نمایش یا مخفی کردن آیتم‌ها بر اساس فیلتر
                activityItems.forEach(item => {
                    if (filter === 'all' || item.classList.contains(filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                // بررسی اگر هیچ آیتمی نمایش داده نمی‌شود
                const visibleItems = document.querySelectorAll('.activity-item[style="display: block;"]');
                const timelineElement = document.querySelector('.activity-timeline');
                
                if (visibleItems.length === 0 && timelineElement) {
                    timelineElement.innerHTML = `
                        <div class="activities-empty">
                            <div class="activities-empty-icon">
                                <i class="fas fa-filter"></i>
                            </div>
                            <div class="activities-empty-text">
                                هیچ فعالیتی با این فیلتر یافت نشد.
                            </div>
                        </div>
                    `;
                }
            });
        });
    });
</script>
@endsection