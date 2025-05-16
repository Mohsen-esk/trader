@extends('layouts.app')

@section('title', 'تغییر رمز عبور')

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
    
    .form-text {
        display: block;
        margin-top: 5px;
        font-size: 0.85rem;
        color: var(--text-secondary);
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
    
    .password-info {
        background-color: var(--hover-bg);
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
    }
    
    .password-info-title {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }
    
    .password-info-title i {
        margin-left: 8px;
        color: var(--primary-color);
    }
    
    .password-info ul {
        padding-right: 20px;
        margin-bottom: 0;
    }
    
    .password-info li {
        color: var(--text-secondary);
        margin-bottom: 5px;
        font-size: 0.9rem;
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
    <a href="{{ route('profile.favorites') }}" class="profile-tab">
        <i class="fas fa-star"></i>
        علاقه‌مندی‌ها
    </a>
    <a href="{{ route('profile.activities') }}" class="profile-tab">
        <i class="fas fa-history"></i>
        تاریخچه فعالیت‌ها
    </a>
    <a href="{{ route('profile.change-password') }}" class="profile-tab active">
        <i class="fas fa-lock"></i>
        تغییر رمز عبور
    </a>
</div>

<div class="profile-edit-card">
    <h1 class="profile-edit-title">
        <i class="fas fa-lock"></i>
        تغییر رمز عبور
    </h1>
    
    <div class="password-info">
        <div class="password-info-title">
            <i class="fas fa-info-circle"></i>
            نکات امنیتی
        </div>
        <ul>
            <li>رمز عبور باید حداقل 8 کاراکتر باشد.</li>
            <li>استفاده از ترکیب حروف بزرگ، کوچک، اعداد و علائم خاص توصیه می‌شود.</li>
            <li>از استفاده از اطلاعات شخصی مانند نام، تاریخ تولد و... در رمز عبور خودداری کنید.</li>
            <li>رمز عبور خود را به صورت دوره‌ای تغییر دهید.</li>
        </ul>
    </div>
    
    <form action="{{ route('profile.update-password') }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- رمز عبور فعلی -->
        <div class="form-group">
            <label for="current_password" class="form-label">رمز عبور فعلی</label>
            <input type="password" id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
            @error('current_password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- رمز عبور جدید -->
        <div class="form-group">
            <label for="password" class="form-label">رمز عبور جدید</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- تکرار رمز عبور جدید -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">تکرار رمز عبور جدید</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>
        
        <!-- دکمه‌های فرم -->
        <div class="btn-container">
            <a href="{{ route('profile.index') }}" class="btn btn-secondary">انصراف</a>
            <button type="submit" class="btn btn-primary">تغییر رمز عبور</button>
        </div>
    </form>
</div>
@endsection