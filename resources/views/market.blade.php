<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ارز و طلا - Etherio</title>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --dark-bg: #222;
            --darker-bg: #111;
            --text-color: #f8f9fa;
            --primary-color: #f39c12;
            --secondary-color: #95a5a6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Vazir', sans-serif;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .welcome-container {
            text-align: center;
            padding: 40px;
            background-color: var(--darker-bg);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 90%;
            margin: 20px;
        }

        .welcome-icon {
            font-size: 4rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .welcome-title {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .welcome-text {
            font-size: 1.1rem;
            color: var(--secondary-color);
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: var(--darker-bg);
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: transform 0.2s ease;
        }

        .back-button:hover {
            transform: translateY(-2px);
        }

        .back-button i {
            margin-left: 8px;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <h1 class="welcome-title">به بخش ارز و طلا خوش آمدید</h1>
        <p class="welcome-text">
            در این بخش می‌توانید آخرین قیمت‌های بازار ارز و طلا را مشاهده کنید.
            اطلاعات به صورت لحظه‌ای به‌روزرسانی می‌شوند.
        </p>
        <a href="/" class="back-button">
            <i class="fas fa-arrow-right"></i>
            بازگشت به صفحه اصلی
        </a>
    </div>
</body>
</html>