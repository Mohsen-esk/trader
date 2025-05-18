@extends('layouts.app')

@section('title', 'ورود به حساب کاربری')

@section('styles')
<style>
    .auth-container {
        max-width: 500px;
        margin: 50px auto;
    }
    
    .auth-card {
        background-color: var(--card-bg);
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--card-border);
    }
    
    .auth-logo {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .auth-logo img {
        height: 60px;
    }
    
    .auth-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 30px;
        text-align: center;
    }
    
    .form-group {
        margin-bottom: 25px;
    }
    
    .form-label {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 10px;
        display: block;
    }
    
    .form-control {
        background-color: var(--hover-bg);
        border: 1px solid var(--card-border);
        border-radius: 8px;
        padding: 12px 15px;
        color: var(--text-primary);
        font-size: 1rem;
        width: 100%;
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        outline: none;
    }
    
    .form-check {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .form-check-input {
        margin-left: 10px;
    }
    
    .form-check-label {
        color: var(--text-secondary);
        font-size: 0.9rem;
    }
    
    .btn-auth {
        background-color: var(--primary-color);
        border: none;
        border-radius: 8px;
        padding: 12px 15px;
        font-weight: 600;
        font-size: 1rem;
        width: 100%;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .btn-auth:hover {
        background-color: #0069d9;
    }
    
    .auth-footer {
        text-align: center;
        margin-top: 25px;
        color: var(--text-secondary);
    }
    
    .auth-footer a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
    }
    
    .auth-footer a:hover {
        text-decoration: underline;
    }
    
    .auth-divider {
        display: flex;
        align-items: center;
        margin: 30px 0;
    }
    
    .auth-divider-line {
        flex-grow: 1;
        height: 1px;
        background-color: var(--card-border);
    }
    
    .auth-divider-text {
        padding: 0 15px;
        color: var(--text-secondary);
        font-size: 0.9rem;
    }
    
    .social-login {
        display: flex;
        gap: 15px;
    }
    
    .social-btn {
        flex: 1;
        padding: 10px;
        border-radius: 8px;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .social-btn i {
        margin-left: 10px;
        font-size: 1.2rem;
    }
    
    .google-btn {
        background-color: #fff;
        color: #333;
        border: 1px solid #ddd;
    }
    
    .google-btn:hover {
        background-color: #f1f1f1;
    }
    
    .facebook-btn {
        background-color: #3b5998;
        color: white;
        border: none;
    }
    
    .facebook-btn:hover {
        background-color: #344e86;
    }
    
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
    }
    
    .alert-danger {
        background-color: rgba(234, 57, 67, 0.1);
        color: #ea3943;
        border: 1px solid rgba(234, 57, 67, 0.2);
    }
</style>
@endsection

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-logo">
            <img src="{{ asset('images/logo.png') }}" alt="لوگو">
        </div>
        
        <h1 class="auth-title">ورود به حساب کاربری</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">آدرس ایمیل</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="ایمیل خود را وارد کنید" required>
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">رمز عبور</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="رمز عبور خود را وارد کنید" required>
            </div>
            
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">مرا به خاطر بسپار</label>
            </div>
            
            <button type="submit" class="btn-auth">ورود</button>
            
            <div class="auth-footer">
                <a href="{{ route('password.request') }}">رمز عبور خود را فراموش کرده‌اید؟</a>
            </div>
        </form>
        
        <div class="auth-divider">
            <div class="auth-divider-line"></div>
            <div class="auth-divider-text">یا ورود با</div>
            <div class="auth-divider-line"></div>
        </div>
        
        <div class="social-login">
            <a href="#" class="social-btn google-btn">
                <i class="fab fa-google"></i>
                گوگل
            </a>
            <a href="#" class="social-btn facebook-btn">
                <i class="fab fa-facebook-f"></i>
                فیسبوک
            </a>
        </div>
        
        <div class="auth-footer mt-4">
            حساب کاربری ندارید؟ <a href="{{ route('register') }}">ثبت نام کنید</a>
        </div>
    </div>
</div>
@endsection