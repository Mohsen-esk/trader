@extends('layouts.app')

@section('title', 'تنظیمات حساب کاربری')

@section('styles')
<style>
    .profile-edit-card {
        background-color: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
    }
    
    .profile-edit-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }
    
    .profile-edit-title i {
        margin-left: 10px;
        color: var(--primary-color);
    }
    
    .settings-section {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--card-border);
    }
    
    .settings-section:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
    }
    
    .settings-section-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    
    .settings-section-title i {
        margin-left: 10px;
        color: var(--primary-color);
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: var(--text-primary);
    }
    
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--card-border);
        border-radius: 8px;
        background-color: var(--hover-bg);
        color: var(--text-primary);
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    }
    
    .form-select {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--card-border);
        border-radius: 8px;
        background-color: var(--hover-bg);
        color: var(--text-primary);
        transition: all 0.3s ease;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: left 15px center;
        background-size: 16px 12px;
        padding-left: 45px;
    }
    
    .form-select:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    }
    
    .form-text {
        display: block;
        margin-top: 5px;
        font-size: 0.85rem;
        color: var(--text-secondary);
    }
    
    .form-check {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .form-check-input {
        width: 18px;
        height: 18px;
        margin-left: 10px;
        cursor: pointer;
    }
    
    .form-check-label {
        cursor: pointer;
        color: var(--text-primary);
    }
    
    .btn-container {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 30px;
    }
    
    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }
    
    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }
    
    .btn-primary:hover {
        background-color: #0069d9;
    }
    
    .btn-secondary {
        background-color: var(--hover-bg);
        color: var(--text-primary);
        border: 1px solid var(--card-border);
    }
    
    .btn-secondary:hover {
        background-color: var(--card-border);
    }
    
    .invalid-feedback {
        display: block;
        color: var(--danger-color);
        font-size: 0.85rem;
        margin-top: 5px;
    }
    
    .is-invalid {
        border-color: var(--danger-color);
    }
    
    .is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
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
</style>
@endsection

@section('content')
<!-- پیام‌های سیستمی -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

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
    <a href="{{ route('profile.activities') }}" class="profile-tab">
        <i class="fas fa-history"></i>
        تاریخچه فعالیت‌ها
    </a>
    <a href="{{ route('profile.change-password') }}" class="profile-tab">
        <i class="fas fa-lock"></i>
        تغییر رمز عبور
    </a>
</div>

<div class="profile-edit-card">
    <h1 class="profile-edit-title">
        <i class="fas fa-cog"></i>
        تنظیمات حساب کاربری
    </h1>
    
    <form action="{{ route('profile.update-settings') }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- تنظیمات اعلان‌ها -->
        <div class="settings-section">
            <h2 class="settings-section-title">
                <i class="fas fa-bell"></i>
                تنظیمات اعلان‌ها
            </h2>
            
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="notification_email" id="notification_email" {{ isset($user->settings['notification_email']) && $user->settings['notification_email'] ? 'checked' : '' }}>
                    <label class="form-check-label" for="notification_email">
                        دریافت اعلان‌ها از طریق ایمیل
                    </label>
                </div>
                <small class="form-text">اخبار مهم، به‌روزرسانی‌ها و تغییرات قیمت‌ها را از طریق ایمیل دریافت کنید.</small>
            </div>
            
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="notification_sms" id="notification_sms" {{ isset($user->settings['notification_sms']) && $user->settings['notification_sms'] ? 'checked' : '' }}>
                    <label class="form-check-label" for="notification_sms">
                        دریافت اعلان‌ها از طریق پیامک
                    </label>
                </div>
                <small class="form-text">هشدارهای مهم و تغییرات قیمت‌ها را از طریق پیامک دریافت کنید.</small>
            </div>
            
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="notification_push" id="notification_push" {{ isset($user->settings['notification_push']) && $user->settings['notification_push'] ? 'checked' : '' }}>
                    <label class="form-check-label" for="notification_push">
                        دریافت اعلان‌های وب
                    </label>
                </div>
                <small class="form-text">اعلان‌های مرورگر را برای به‌روزرسانی‌های مهم فعال کنید.</small>
            </div>
        </div>
        
        <!-- تنظیمات ظاهری -->
        <div class="settings-section">
            <h2 class="settings-section-title">
                <i class="fas fa-palette"></i>
                تنظیمات ظاهری
            </h2>
            
            <div class="form-group">
                <label for="theme" class="form-label">تم</label>
                <select id="theme" name="theme" class="form-select">
                    <option value="light" {{ isset($user->settings['theme']) && $user->settings['theme'] == 'light' ? 'selected' : '' }}>روشن</option>
                    <option value="dark" {{ isset($user->settings['theme']) && $user->settings['theme'] == 'dark' ? 'selected' : '' }}>تیره</option>
                    <option value="auto" {{ isset($user->settings['theme']) && $user->settings['theme'] == 'auto' ? 'selected' : '' }}>خودکار (بر اساس تنظیمات سیستم)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="language" class="form-label">زبان</label>
                <select id="language" name="language" class="form-select">
                    <option value="fa" {{ isset($user->settings['language']) && $user->settings['language'] == 'fa' ? 'selected' : '' }}>فارسی</option>
                    <option value="en" {{ isset($user->settings['language']) && $user->settings['language'] == 'en' ? 'selected' : '' }}>English</option>
                </select>
            </div>
        </div>
        
        <!-- دکمه‌های فرم -->
        <div class="btn-container">
            <a href="{{ route('profile.index') }}" class="btn btn-secondary">انصراف</a>
            <button type="submit" class="btn btn-primary">ذخیره تنظیمات</button>
        </div>
    </form>
</div>
@endsection