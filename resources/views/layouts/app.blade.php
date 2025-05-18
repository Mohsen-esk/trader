<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'بازار آنلاین')</title>
    
    <!-- فونت‌ها -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- فونت آیکون‌ها -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- بوت‌استرپ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    
    <!-- استایل‌های سفارشی -->
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --accent-color: #00c26f;
            --warning-color: #ffc107;
            --danger-color: #ea3943;
            
            --body-bg: #f8f9fa;
            --card-bg: #ffffff;
            --card-border: #e9ecef;
            --text-primary: #212529;
            --text-secondary: #6c757d;
            --hover-bg: #f8f9fa;
        }
        
        [data-theme="dark"] {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --accent-color: #00c26f;
            --warning-color: #ffc107;
            --danger-color: #ea3943;
            
            --body-bg: #121212;
            --card-bg: #1e1e1e;
            --card-border: #2d2d2d;
            --text-primary: #e9ecef;
            --text-secondary: #adb5bd;
            --hover-bg: #2d2d2d;
        }
        
        body {
            font-family: 'Vazirmatn', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-primary);
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        .navbar {
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--card-border);
            padding: 15px 0;
        }
        
        .navbar-brand img {
            height: 40px;
        }
        
        .nav-link {
            color: var(--text-primary);
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-color);
        }
        
        .nav-link.active {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .dropdown-menu {
            background-color: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 10px;
            min-width: 200px;
        }
        
        .dropdown-item {
            color: var(--text-primary);
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background-color: var(--hover-bg);
            color: var(--primary-color);
        }
        
        .dropdown-item i {
            margin-left: 8px;
            width: 20px;
            text-align: center;
        }
        
        .dropdown-divider {
            border-top: 1px solid var(--card-border);
            margin: 5px 0;
        }
        
        .theme-toggle {
            background: transparent;
            border: none;
            color: var(--text-primary);
            font-size: 1.2rem;
            cursor: pointer;
            padding: 5px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .theme-toggle:hover {
            background-color: var(--hover-bg);
        }
        
        .user-dropdown {
            display: flex;
            align-items: center;
            background: transparent;
            border: none;
            color: var(--text-primary);
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        
        .user-dropdown:hover {
            background-color: var(--hover-bg);
        }
        
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            margin-left: 8px;
        }
        
        .user-name {
            margin: 0 5px;
        }
        
        .footer {
            background-color: var(--card-bg);
            border-top: 1px solid var(--card-border);
            padding: 50px 0 20px;
            margin-top: 50px;
        }
        
        .footer-title {
            color: var(--text-primary);
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 1.2rem;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--primary-color);
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--hover-bg);
            color: var(--text-primary);
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            color: var(--text-secondary);
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid var(--card-border);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .card {
            background-color: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .container {
            padding: 0 15px;
        }
        
        .alert {
            border-radius: 10px;
            padding: 15px 20px;
        }
        
        @media (max-width: 768px) {
            .navbar-collapse {
                background-color: var(--card-bg);
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                margin-top: 10px;
            }
            
            .nav-link {
                padding: 10px 15px;
                margin: 5px 0;
            }
            
            .navbar-toggler {
                border: none;
                padding: 0;
                font-size: 1.5rem;
                color: var(--text-primary);
            }
            
            .navbar-toggler:focus {
                box-shadow: none;
            }
        }
    </style>
    
    <!-- استایل‌های اضافی -->
    @yield('styles')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="لوگو">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">صفحه اصلی</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('markets.*') ? 'active' : '' }}" href="#" id="marketsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                بازارها
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="marketsDropdown">
                                <li><a class="dropdown-item {{ request()->routeIs('markets.gold') ? 'active' : '' }}" href="{{ route('markets.gold') }}"><i class="fas fa-coins"></i> طلا</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('markets.silver') ? 'active' : '' }}" href="{{ route('markets.silver') }}"><i class="fas fa-coins"></i> نقره</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('markets.crypto') ? 'active' : '' }}" href="{{ route('markets.crypto') }}"><i class="fab fa-bitcoin"></i> ارز دیجیتال</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('markets.stocks') ? 'active' : '' }}" href="{{ route('markets.stocks') }}"><i class="fas fa-chart-line"></i> بورس</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">تحلیل‌ها</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">آموزش</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">اخبار</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">درباره ما</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">تماس با ما</a>
                        </li>
                    </ul>
                    
                    <div class="d-flex">
                        @auth
                            <div class="dropdown me-3">
                                <button class="user-dropdown" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ Auth::user()->avatar ? asset('storage/avatars/'.Auth::user()->avatar) : asset('images/default-avatar.png') }}" alt="{{ Auth::user()->name }}" class="user-avatar">
                                    <span class="user-name">{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> داشبورد شخصی</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="fas fa-user"></i> پروفایل من</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.favorites') }}"><i class="fas fa-star"></i> علاقه‌مندی‌ها</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.settings') }}"><i class="fas fa-cog"></i> تنظیمات</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> خروج
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">ورود</a>
                            <a href="{{ route('register') }}" class="btn btn-primary me-3">ثبت نام</a>
                        @endauth
                        
                        <button id="theme-toggle" class="theme-toggle">
                            <i class="fas fa-moon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>
    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4 class="footer-title">بازار آنلاین</h4>
                    <p class="text-secondary">پلتفرم جامع اطلاعات بازارهای مالی با ارائه قیمت‌های لحظه‌ای، تحلیل‌های تخصصی و اخبار به‌روز.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-telegram"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4 class="footer-title">بازارها</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('markets.gold') }}">قیمت طلا</a></li>
                        <li><a href="{{ route('markets.silver') }}">قیمت نقره</a></li>
                        <li><a href="{{ route('markets.crypto') }}">ارزهای دیجیتال</a></li>
                        <li><a href="{{ route('markets.stocks') }}">بورس</a></li>
                        <li><a href="#">ارز</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4 class="footer-title">دسترسی سریع</h4>
                    <ul class="footer-links">
                        <li><a href="#">تحلیل‌های روزانه</a></li>
                        <li><a href="#">آموزش‌ها</a></li>
                        <li><a href="#">اخبار اقتصادی</a></li>
                        <li><a href="#">تقویم اقتصادی</a></li>
                        <li><a href="#">وبلاگ</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4 class="footer-title">پشتیبانی</h4>
                    <ul class="footer-links">
                        <li><a href="#">تماس با ما</a></li>
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">سوالات متداول</a></li>
                        <li><a href="#">قوانین و مقررات</a></li>
                        <li><a href="#">حریم خصوصی</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>© ۱۴۰۴ بازار آنلاین - تمامی حقوق محفوظ است.</p>
            </div>
        </div>
    </footer>
    
    <!-- اسکریپت‌های بوت‌استرپ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- اسکریپت تم -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('theme-toggle');
            const htmlElement = document.documentElement;
            const icon = themeToggle.querySelector('i');
            
            // بررسی تم ذخیره شده در localStorage
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                htmlElement.setAttribute('data-theme', savedTheme);
                updateIcon(savedTheme);
            } else {
                // بررسی تنظیمات سیستم
                const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
                const theme = prefersDarkMode ? 'dark' : 'light';
                htmlElement.setAttribute('data-theme', theme);
                updateIcon(theme);
            }
            
            themeToggle.addEventListener('click', function() {
                const currentTheme = htmlElement.getAttribute('data-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                htmlElement.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateIcon(newTheme);
            });
            
            function updateIcon(theme) {
                if (theme === 'dark') {
                    icon.className = 'fas fa-sun';
                } else {
                    icon.className = 'fas fa-moon';
                }
            }
        });
    </script>
    
    <!-- اسکریپت‌های اضافی -->
    @yield('scripts')
</body>
</html>