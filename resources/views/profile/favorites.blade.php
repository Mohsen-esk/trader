@extends('layouts.app')

@section('title', 'علاقه‌مندی‌های من')

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
    
    .favorites-empty {
        text-align: center;
        padding: 40px 0;
    }
    
    .favorites-empty-icon {
        font-size: 3rem;
        color: var(--text-secondary);
        margin-bottom: 20px;
    }
    
    .favorites-empty-text {
        color: var(--text-secondary);
        font-size: 1.1rem;
        margin-bottom: 20px;
    }
    
    .favorites-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
    
    .favorite-item {
        background-color: var(--hover-bg);
        border-radius: 10px;
        padding: 15px;
        position: relative;
        transition: all 0.3s ease;
    }
    
    .favorite-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .favorite-remove {
        position: absolute;
        top: 10px;
        left: 10px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: var(--card-bg);
        color: var(--danger-color);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid var(--card-border);
    }
    
    .favorite-remove:hover {
        background-color: var(--danger-color);
        color: white;
    }
    
    .favorite-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }
    
    .favorite-icon i {
        color: white;
        font-size: 1.2rem;
    }
    
    .favorite-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 5px;
    }
    
    .favorite-subtitle {
        font-size: 0.9rem;
        color: var(--text-secondary);
        margin-bottom: 15px;
    }
    
    .favorite-price {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 5px;
    }
    
    .favorite-change {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 0.8rem;
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
    
    .favorite-link {
        display: block;
        text-align: center;
        margin-top: 15px;
        padding: 8px 0;
        border-radius: 8px;
        background-color: var(--card-bg);
        color: var(--primary-color);
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid var(--card-border);
    }
    
    .favorite-link:hover {
        background-color: var(--primary-color);
        color: white;
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
</style>
@endsection

@section('content')
<!-- تب‌های پروفایل -->
<div class="profile-tabs">
    <a href="{{ route('profile.index') }}" class="profile-tab">
        <i class="fas fa-home"></i>
        خلاصه
    </a>
    <a href="{{ route('profile.favorites') }}" class="profile-tab active">
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

<div class="profile-content-card">
    <h1 class="profile-content-title">
        <i class="fas fa-star"></i>
        علاقه‌مندی‌های من
    </h1>
    
    @if(empty($favorites) || count($favorites) == 0)
        <div class="favorites-empty">
            <div class="favorites-empty-icon">
                <i class="far fa-star"></i>
            </div>
            <div class="favorites-empty-text">
                شما هنوز هیچ موردی را به علاقه‌مندی‌ها اضافه نکرده‌اید.
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                مشاهده بازارها
            </a>
        </div>
    @else
        <div class="favorites-list">
            <!-- نمونه مورد علاقه‌مندی - طلا -->
            <div class="favorite-item">
                <span class="favorite-remove" title="حذف از علاقه‌مندی‌ها">
                    <i class="fas fa-times"></i>
                </span>
                <div class="favorite-icon" style="background-color: #FFD700;">
                    <i class="fas fa-coins"></i>
                </div>
                <div class="favorite-title">طلای 18 عیار</div>
                <div class="favorite-subtitle">بازار طلا</div>
                <div class="favorite-price">2,850,000 تومان</div>
                <div class="favorite-change positive">
                    <i class="fas fa-caret-up"></i>
                    1.5%
                </div>
                <a href="{{ route('markets.gold') }}" class="favorite-link">مشاهده جزئیات</a>
            </div>
            
            <!-- نمونه مورد علاقه‌مندی - بیت کوین -->
            <div class="favorite-item">
                <span class="favorite-remove" title="حذف از علاقه‌مندی‌ها">
                    <i class="fas fa-times"></i>
                </span>
                <div class="favorite-icon" style="background-color: #F7931A;">
                    <i class="fab fa-bitcoin"></i>
                </div>
                <div class="favorite-title">بیت کوین</div>
                <div class="favorite-subtitle">ارز دیجیتال</div>
                <div class="favorite-price">65,800 دلار</div>
                <div class="favorite-change positive">
                    <i class="fas fa-caret-up"></i>
                    2.5%
                </div>
                <a href="{{ route('markets.crypto') }}" class="favorite-link">مشاهده جزئیات</a>
            </div>
            
            <!-- نمونه مورد علاقه‌مندی - شاخص کل -->
            <div class="favorite-item">
                <span class="favorite-remove" title="حذف از علاقه‌مندی‌ها">
                    <i class="fas fa-times"></i>
                </span>
                <div class="favorite-icon" style="background-color: #4CAF50;">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="favorite-title">شاخص کل</div>
                <div class="favorite-subtitle">بازار بورس</div>
                <div class="favorite-price">2,150,000</div>
                <div class="favorite-change negative">
                    <i class="fas fa-caret-down"></i>
                    0.5%
                </div>
                <a href="{{ route('markets.stocks') }}" class="favorite-link">مشاهده جزئیات</a>
            </div>
            
            <!-- نمونه مورد علاقه‌مندی - نقره -->
            <div class="favorite-item">
                <span class="favorite-remove" title="حذف از علاقه‌مندی‌ها">
                    <i class="fas fa-times"></i>
                </span>
                <div class="favorite-icon" style="background-color: #C0C0C0;">
                    <i class="fas fa-medal"></i>
                </div>
                <div class="favorite-title">نقره 999</div>
                <div class="favorite-subtitle">بازار نقره</div>
                <div class="favorite-price">25,800 تومان</div>
                <div class="favorite-change positive">
                    <i class="fas fa-caret-up"></i>
                    1.2%
                </div>
                <a href="{{ route('markets.silver') }}" class="favorite-link">مشاهده جزئیات</a>
            </div>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // حذف مورد از علاقه‌مندی‌ها
        const removeButtons = document.querySelectorAll('.favorite-remove');
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const item = this.parentElement;
                
                // انیمیشن حذف
                item.style.opacity = '0';
                setTimeout(() => {
                    item.style.height = '0';
                    item.style.margin = '0';
                    item.style.padding = '0';
                    item.style.overflow = 'hidden';
                    
                    setTimeout(() => {
                        item.remove();
                        
                        // بررسی اگر همه موارد حذف شدند
                        const remainingItems = document.querySelectorAll('.favorite-item');
                        if (remainingItems.length === 0) {
                            const favoritesList = document.querySelector('.favorites-list');
                            favoritesList.innerHTML = `
                                <div class="favorites-empty">
                                    <div class="favorites-empty-icon">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="favorites-empty-text">
                                        شما هنوز هیچ موردی را به علاقه‌مندی‌ها اضافه نکرده‌اید.
                                    </div>
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary">
                                        مشاهده بازارها
                                    </a>
                                </div>
                            `;
                        }
                    }, 300);
                }, 300);
                
                // در اینجا می‌توانید کد مربوط به حذف از سرور را اضافه کنید
                // مثال: ارسال درخواست AJAX به سرور
            });
        });
    });
</script>
@endsection