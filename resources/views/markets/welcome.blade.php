<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تریدر | صفحه اصلی</title>
    <!-- فونت‌آوسام برای آیکون‌ها -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- فونت ایران‌سنس -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="app-container">
        <!-- هدر -->
        <header class="header">
            <div class="logo">
                <i class="fas fa-chart-line"></i>
                <span>تریدر</span>
            </div>
            <div class="header-left">
                <div class="theme-toggle">
                    <i class="fas fa-moon"></i>
                </div>
            </div>
        </header>

        <!-- منوی اصلی -->
        <div class="menu-container">
            <div class="menu-grid">
                <!-- طلا -->
                <a href="/markets/gold" class="menu-item">
                    <div class="icon-wrapper gold">
                        <i class="fas fa-coins"></i>
                    </div>
                    <span class="menu-title">طلا</span>
                    <span class="menu-subtitle">قیمت لحظه‌ای طلا و سکه</span>
                </a>

                <!-- نقره -->
                <a href="/markets/silver" class="menu-item">
                    <div class="icon-wrapper silver">
                        <i class="fas fa-ring"></i>
                    </div>
                    <span class="menu-title">نقره</span>
                    <span class="menu-subtitle">قیمت نقره و مثقال</span>
                </a>

                <!-- بورس -->
                <a href="/markets/stocks" class="menu-item">
                    <div class="icon-wrapper stocks">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <span class="menu-title">بورس</span>
                    <span class="menu-subtitle">شاخص و نمادهای بورسی</span>
                </a>

                <!-- ارز دیجیتال -->
                <a href="/markets/crypto" class="menu-item">
                    <div class="icon-wrapper crypto">
                        <i class="fab fa-bitcoin"></i>
                    </div>
                    <span class="menu-title">ارز دیجیتال</span>
                    <span class="menu-subtitle">قیمت‌های لحظه‌ای رمزارزها</span>
                </a>

                <!-- نفت -->
                <a href="/markets/oil" class="menu-item">
                    <div class="icon-wrapper oil">
                        <i class="fas fa-gas-pump"></i>
                    </div>
                    <span class="menu-title">نفت</span>
                    <span class="menu-subtitle">قیمت نفت و مشتقات</span>
                </a>

                <!-- ابزار -->
                <a href="/markets/tools" class="menu-item">
                    <div class="icon-wrapper tools">
                        <i class="fas fa-tools"></i>
                    </div>
                    <span class="menu-title">ابزار</span>
                    <span class="menu-subtitle">ماشین حساب و تبدیل</span>
                </a>

                <!-- تحلیل‌ها -->
                <a href="/markets/analysis" class="menu-item">
                    <div class="icon-wrapper analysis">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <span class="menu-title">تحلیل‌ها</span>
                    <span class="menu-subtitle">تحلیل تکنیکال و بنیادی</span>
                </a>
            </div>
        </div>
    </div>

    <style>
    :root {
        --bg-color: #121212;
        --card-bg: #1E1E1E;
        --text-primary: #FFFFFF;
        --text-secondary: #A0A0A0;
        --primary-color: #3498db;
        --gold-color: #FFD700;
        --silver-color: #C0C0C0;
        --stocks-color: #2ECC71;
        --crypto-color: #F39C12;
        --oil-color: #E74C3C;
        --tools-color: #9B59B6;
        --analysis-color: #1ABC9C;
    }

    body {
        margin: 0;
        padding: 0;
        background-color: var(--bg-color);
        color: var(--text-primary);
        font-family: Vazirmatn, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .app-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* هدر */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .theme-toggle {
        cursor: pointer;
        padding: 10px;
    }

    /* گرید منو */
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    /* آیتم‌های منو */
    .menu-item {
        background-color: var(--card-bg);
        border-radius: 15px;
        padding: 20px;
        text-decoration: none;
        color: var(--text-primary);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .menu-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .icon-wrapper {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        font-size: 1.5rem;
    }

    .menu-title {
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .menu-subtitle {
        font-size: 0.9rem;
        color: var(--text-secondary);
    }

    /* رنگ‌های آیکون */
    .gold { background-color: rgba(255, 215, 0, 0.1); color: var(--gold-color); }
    .silver { background-color: rgba(192, 192, 192, 0.1); color: var(--silver-color); }
    .stocks { background-color: rgba(46, 204, 113, 0.1); color: var(--stocks-color); }
    .crypto { background-color: rgba(243, 156, 18, 0.1); color: var(--crypto-color); }
    .oil { background-color: rgba(231, 76, 60, 0.1); color: var(--oil-color); }
    .tools { background-color: rgba(155, 89, 182, 0.1); color: var(--tools-color); }
    .analysis { background-color: rgba(26, 188, 156, 0.1); color: var(--analysis-color); }

    /* ریسپانسیو */
    @media (max-width: 768px) {
        .app-container {
            padding: 10px;
        }

        .menu-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .icon-wrapper {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        .menu-title {
            font-size: 1rem;
        }

        .menu-subtitle {
            font-size: 0.8rem;
        }
    }
    </style>
</body>
</html>