<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'داشبورد بازار | پلتفرم جامع بازارهای مالی')</title>
    
    <!-- فونت‌آوسام -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- بوت‌استرپ RTL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    
    <!-- فونت وزیر -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    
    <style>
        :root {
            --primary-color: #3861FB;
            --secondary-color: #627EEA;
            --accent-color: #00C26F;
            --danger-color: #EA3943;
            --warning-color: #F3BA2F;
            --dark-bg: #0B0E11;
            --card-bg: #171B26;
            --card-border: #222531;
            --text-primary: #F0F4F8;
            --text-secondary: #A7B1C2;
            --text-muted: #616E85;
            --chart-grid: #2A2E39;
            --hover-bg: #2A2E39;
        }
        
        body {
            font-family: 'Vazirmatn', 'Tahoma', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* هدر و ناوبری */
        .navbar {
            background-color: var(--dark-bg);
            border-bottom: 1px solid var(--card-border);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary) !important;
        }
        
        .navbar-brand img {
            height: 32px;
            margin-left: 10px;
        }
        
        .navbar-nav .nav-link {
            color: var(--text-secondary);
            font-weight: 500;
            padding: 10px 15px;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 5px;
        }
        
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--text-primary);
            background-color: var(--hover-bg);
        }
        
        .navbar-toggler {
            border: none;
            color: var(--text-primary);
        }
        
        /* کانتینر اصلی */
        .main-container {
            flex: 1;
            padding: 30px 0;
        }
        
        /* کارت‌ها */
        .crypto-card {
            background-color: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .crypto-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .crypto-card .card-header {
            background: none;
            border-bottom: 1px solid var(--card-border);
            padding: 0 0 15px 0;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .crypto-card .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
        }
        
        .crypto-card .card-title i {
            margin-left: 10px;
        }
        
        /* دکمه‌ها */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            font-weight: 500;
            border-radius: 8px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #2D50D9;
            border-color: #2D50D9;
            transform: translateY(-2px);
        }
        
        .btn-outline {
            background: transparent;
            border: 1px solid var(--card-border);
            color: var(--text-primary);
            border-radius: 8px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background-color: var(--hover-bg);
            color: var(--text-primary);
            transform: translateY(-2px);
        }
        
        /* جدول‌ها */
        .crypto-table {
            width: 100%;
        }
        
        .crypto-table th {
            color: var(--text-secondary);
            font-weight: 500;
            border-bottom: 1px solid var(--card-border);
            padding: 12px 15px;
        }
        
        .crypto-table td {
            padding: 15px;
            border-bottom: 1px solid var(--card-border);
            vertical-align: middle;
        }
        
        .crypto-table tr:last-child td {
            border-bottom: none;
        }
        
        .crypto-table tr:hover {
            background-color: var(--hover-bg);
        }
        
        /* فوتر */
        footer {
            background-color: var(--card-bg);
            border-top: 1px solid var(--card-border);
            padding: 30px 0;
            margin-top: auto;
        }
        
        footer h5 {
            color: var(--text-primary);
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        footer ul {
            list-style: none;
            padding: 0;
        }
        
        footer ul li {
            margin-bottom: 10px;
        }
        
        footer ul li a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        footer ul li a:hover {
            color: var(--text-primary);
        }
        
        .footer-bottom {
            border-top: 1px solid var(--card-border);
            padding-top: 20px;
            margin-top: 30px;
            color: var(--text-muted);
            font-size: 0.9rem;
        }
        
        .social-icons a {
            color: var(--text-secondary);
            font-size: 1.5rem;
            margin-left: 15px;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            color: var(--text-primary);
            transform: translateY(-3px);
        }
        
        /* سایدبار */
        .sidebar {
            background-color: var(--card-bg);
            border-left: 1px solid var(--card-border);
            height: 100%;
            padding: 20px 0;
        }
        
        .sidebar-item {
            padding: 12px 20px;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .sidebar-item:hover, 
        .sidebar-item.active {
            background-color: var(--hover-bg);
            color: var(--text-primary);
        }
        
        .sidebar-item i {
            margin-left: 10px;
            font-size: 1.1rem;
        }
        
        /* بج‌ها و نشانگرها */
        .badge-up {
            color: var(--accent-color);
            background-color: rgba(0, 194, 111, 0.1);
        }
        
        .badge-down {
            color: var(--danger-color);
            background-color: rgba(234, 57, 67, 0.1);
        }
        
        .text-up {
            color: var(--accent-color);
        }
        
        .text-down {
            color: var(--danger-color);
        }
        
        /* هدر صفحه */
        .page-header {
            margin-bottom: 30px;
        }
        
        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .page-header p {
            color: var(--text-secondary);
            font-size: 1.1rem;
        }
        
        /* کارت قیمت */
        .price-card {
            background-color: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
            height: 100%;
        }
        
        .price-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .price-card .title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--text-primary);
        }
        
        .price-card .subtitle {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 20px;
        }
        
        .price-card .price {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--text-primary);
        }
        
        .price-card .change {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .price-card .change.positive {
            background-color: rgba(0, 194, 111, 0.1);
            color: var(--accent-color);
        }
        
        .price-card .change.negative {
            background-color: rgba(234, 57, 67, 0.1);
            color: var(--danger-color);
        }
        
        .price-card .range {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--card-border);
        }
        
        .price-card .range .item {
            text-align: center;
        }
        
        .price-card .range .label {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 5px;
        }
        
        .price-card .range .value {
            font-size: 1rem;
            color: var(--text-primary);
            font-weight: 500;
        }
        
        .price-card .updated-time {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: 20px;
        }
        
        /* نمودار */
        .chart-container {
            height: 350px;
            position: relative;
        }
        
        /* جدول قیمت‌ها */
        .market-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .market-table th {
            color: var(--text-secondary);
            font-weight: 500;
            border-bottom: 1px solid var(--card-border);
            padding: 12px 15px;
            text-align: right;
        }
        
        .market-table td {
            padding: 15px;
            border-bottom: 1px solid var(--card-border);
            vertical-align: middle;
        }
        
        .market-table tr:last-child td {
            border-bottom: none;
        }
        
        .market-table tr:hover {
            background-color: var(--hover-bg);
        }
        
        .market-table .market-name {
            display: flex;
            align-items: center;
        }
        
        .market-table .market-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
            background-color: var(--hover-bg);
        }
        
        .market-table .market-icon i {
            font-size: 16px;
        }
        
        .market-table .market-title {
            font-weight: 600;
            color: var(--text-primary);
        }
        
        .market-table .market-subtitle {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }
        
        .market-table .price {
            font-weight: 600;
            color: var(--text-primary);
        }
        
        .market-table .change {
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 20px;
            display: inline-block;
            min-width: 80px;
            text-align: center;
        }
        
        .market-table .change.positive {
            background-color: rgba(0, 194, 111, 0.1);
            color: var(--accent-color);
        }
        
        .market-table .change.negative {
            background-color: rgba(234, 57, 67, 0.1);
            color: var(--danger-color);
        }
        
        /* هیرو سکشن */
        .hero-section {
            padding: 60px 0;
            background-color: var(--card-bg);
            border-radius: 15px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiPjxjaXJjbGUgY3g9IjIwIiBjeT0iMjAiIHI9IjEiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSwgMC4xKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==');
            opacity: 0.5;
        }
        
        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .hero-section p {
            font-size: 1.2rem;
            color: var(--text-secondary);
            margin-bottom: 30px;
        }
        
        /* جستجو */
        .search-box {
            background-color: var(--hover-bg);
            border: 1px solid var(--card-border);
            border-radius: 8px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
        }
        
        .search-box input {
            background: none;
            border: none;
            color: var(--text-primary);
            width: 100%;
            padding: 5px 10px;
        }
        
        .search-box input:focus {
            outline: none;
        }
        
        .search-box i {
            color: var(--text-secondary);
        }
        
        /* افکت لودینگ */
        .shimmer {
            position: relative;
            overflow: hidden;
        }
        
        .shimmer::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.05) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            animation: shimmer 1.5s infinite;
        }
        
        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }
        
        /* مدیا کوئری‌ها */
        @media (max-width: 768px) {
            .navbar-nav {
                margin-top: 15px;
            }
            
            .navbar-nav .nav-link {
                padding: 10px;
            }
            
            .crypto-card {
                padding: 15px;
            }
            
            .hero-section {
                padding: 40px 0;
            }
            
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .market-table .market-name {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .market-table .market-icon {
                margin-bottom: 5px;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body>

        @include('layouts.header')

    <!-- محتوای اصلی -->
    <div class="main-container">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- فوتر -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5>داشبورد بازار</h5>
                    <p class="text-secondary">پلتفرم جامع مدیریت و تحلیل بازارهای مالی</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fab fa-telegram"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>بازارها</h5>
                    <ul>
                        <li><a href="/markets/gold">طلا و سکه</a></li>
                        <li><a href="/markets/currency">ارز</a></li>
                        <li><a href="/markets/crypto">ارز دیجیتال</a></li>
                        <li><a href="/markets/stock">بورس</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>خدمات</h5>
                    <ul>
                        <li><a href="#">تحلیل بازار</a></li>
                        <li><a href="#">سیگنال‌های معاملاتی</a></li>
                        <li><a href="#">پرتفوی آنلاین</a></li>
                        <li><a href="#">هشدارهای قیمتی</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>درباره ما</h5>
                    <ul>
                        <li><a href="#">معرفی</a></li>
                        <li><a href="#">تماس با ما</a></li>
                        <li><a href="#">قوانین و مقررات</a></li>
                        <li><a href="#">سوالات متداول</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; {{ date('Y') }} - تمامی حقوق برای داشبورد بازار محفوظ است.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p>نسخه 1.0.0</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- اسکریپت‌های جاوااسکریپت -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>