@extends('layouts.app')

@section('title', 'تغییر رمز عبور')

@section('styles')
<style>
    .auth-container {
        max-width: 500px;
        margin: 50px auto;
    }
    
    .auth-card {
        background-color: var(--card-bg);
        border-radius: 15px;
        border: 1px solid var(--card-border);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        padding: 40px;
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
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }
    
    .btn-auth {
        background-color: var(--primary-color);
        border: none;
        border-radius: 8px;
        padding: 12px 15px;
        font-weight: 600;
        font-size: 1rem;
        width: 100%;
        margin-top: 10px;
    }
</style>
@endsection

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-logo">
            <img src="{{ asset('images/logo.png') }}" alt="لوگو">
        </div>
        
        <h1 class="auth-title">تغییر رمز عبور</h1>
        
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="form-group">
                <label for="email" class="form-label">آدرس ایمیل</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="ایمیل خود را وارد کنید" required>
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">رمز عبور جدید</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="رمز عبور جدید را وارد کنید" required>
            </div>
            
            <div class="form-group">
                <label for="password_confirmation" class="form-label">تکرار رمز عبور جدید</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="رمز عبور جدید را تکرار کنید" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-auth">تغییر رمز عبور</button>
        </form>
    </div>
</div>
@endsection