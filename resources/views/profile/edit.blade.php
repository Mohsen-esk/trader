@extends('layouts.app')

@section('title', 'ویرایش پروفایل کاربری')

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
    
    .avatar-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .current-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-left: 20px;
        border: 3px solid var(--card-bg);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .avatar-upload {
        flex-grow: 1;
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
</style>
@endsection

@section('content')
<div class="profile-edit-card">
    <h1 class="profile-edit-title">
        <i class="fas fa-user-edit"></i>
        ویرایش پروفایل
    </h1>
    
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- تصویر پروفایل -->
        <div class="form-group">
            <label class="form-label">تصویر پروفایل</label>
            <div class="avatar-container">
                <img src="{{ $user->avatar ? asset('storage/avatars/'.$user->avatar) : asset('images/default-avatar.png') }}" alt="{{ $user->name }}" class="current-avatar">
                <div class="avatar-upload">
                    <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                    <small class="form-text">فرمت‌های مجاز: JPG، PNG، GIF (حداکثر 2 مگابایت)</small>
                    @error('avatar')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- نام کاربر -->
        <div class="form-group">
            <label for="name" class="form-label">نام</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- ایمیل -->
        <div class="form-group">
            <label for="email" class="form-label">ایمیل</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- شماره تماس -->
        <div class="form-group">
            <label for="phone" class="form-label">شماره تماس</label>
            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}">
            <small class="form-text">اختیاری - برای اطلاع‌رسانی‌های مهم استفاده می‌شود</small>
            @error('phone')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- بیوگرافی -->
        <div class="form-group">
            <label for="bio" class="form-label">بیوگرافی</label>
            <textarea id="bio" name="bio" class="form-control @error('bio') is-invalid @enderror" rows="4">{{ old('bio', $user->bio) }}</textarea>
            <small class="form-text">اختیاری - حداکثر 1000 کاراکتر</small>
            @error('bio')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- دکمه‌های فرم -->
        <div class="btn-container">
            <a href="{{ route('profile.index') }}" class="btn btn-secondary">انصراف</a>
            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </div>
    </form>
</div>
@endsection