@extends('layouts.app')

@section('title', 'بازیابی رمز عبور')

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
        margin-bottom: 20px;
        text-align: center;
    }
    
    .auth-subtitle {
        color: var(--text-secondary);
        text-align: center;
        margin-bottom: 30px;
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
    
    .alert {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    
    .alert-success {
        background-color: rgba(0, 194, 111, 0.1);
        color: var(--accent-color);
        border: 1px solid rgba(0, 194, 111, 0.2);
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
        
        <h1 class="auth-title">بازیابی رمز عبور</h1>
        <p class="auth-subtitle">ایمیل خود را وارد کنید تا لینک بازیابی رمز عبور برای شما ارسال شود.</p>
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">آدرس ایمیل</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="ایمیل خود را وارد کنید" required>
            </div>
            
            <button type="submit" class="btn-auth">ارسال لینک بازیابی</button>
            
            <div class="auth-footer">
                <a href="{{ route('login') }}">بازگشت به صفحه ورود</a>
            </div>
        </form>
    </div>
</div>
@endsection