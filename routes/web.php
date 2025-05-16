cat > /var/www/html/trader/routes/web.php << 'EOL'
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Markets\GoldController;
use App\Http\Controllers\Markets\SilverController;
use App\Http\Controllers\Markets\CryptoController;
use App\Http\Controllers\Markets\StocksController;

// صفحه اصلی
Route::get('/', function () {
    return view('home');
})->name('home');

// مسیرهای مربوط به طلا
Route::prefix('markets/gold')->group(function () {
    Route::get('/', [GoldController::class, 'index'])->name('markets.gold');
    Route::get('/latest-prices', [GoldController::class, 'getLatestPrices']);
    Route::get('/chart-data', [GoldController::class, 'getChartData']);
    Route::get('/api/prices', [GoldController::class, 'apiPrices']);
    Route::get('/api/chart', [GoldController::class, 'apiChart']);
});

// مسیرهای مربوط به نقره
Route::prefix('markets/silver')->group(function () {
    Route::get('/', [SilverController::class, 'index'])->name('markets.silver');
    Route::get('/latest-prices', [SilverController::class, 'getLatestPrices']);
    Route::get('/chart-data', [SilverController::class, 'getChartData']);
});

// مسیرهای مربوط به ارز دیجیتال
Route::prefix('markets/crypto')->group(function () {
    Route::get('/', [CryptoController::class, 'index'])->name('markets.crypto');
    Route::get('/latest-prices', [CryptoController::class, 'getLatestPrices']);
    Route::get('/chart-data', [CryptoController::class, 'getChartData']);
});

// مسیرهای مربوط به بورس
Route::prefix('markets/stocks')->group(function () {
    Route::get('/', [StocksController::class, 'index'])->name('markets.stocks');
    Route::get('/latest-prices', [StocksController::class, 'getLatestPrices']);
    Route::get('/chart-data', [StocksController::class, 'getChartData']);
});

// مسیرهای مربوط به ابزارها
Route::prefix('markets/tools')->group(function () {
    Route::get('/', function () {
        return view('markets.tools');
    })->name('markets.tools');
    Route::get('/calculator', function () {
        return view('markets.tools.calculator');
    })->name('markets.tools.calculator');
    Route::get('/converter', function () {
        return view('markets.tools.converter');
    })->name('markets.tools.converter');
});
// مسیرهای پروفایل کاربر (با احراز هویت)
Route::middleware(['auth'])->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::get('/change-password', [App\Http\Controllers\ProfileController::class, 'changePassword'])->name('profile.change-password');
        Route::put('/update-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.update-password');
        Route::get('/settings', [App\Http\Controllers\ProfileController::class, 'settings'])->name('profile.settings');
        Route::put('/update-settings', [App\Http\Controllers\ProfileController::class, 'updateSettings'])->name('profile.update-settings');
        Route::get('/favorites', [App\Http\Controllers\ProfileController::class, 'favorites'])->name('profile.favorites');
        Route::get('/activities', [App\Http\Controllers\ProfileController::class, 'activities'])->name('profile.activities');
    });
});

// مسیرهای مربوط به تحلیل‌ها
Route::prefix('markets/analysis')->group(function () {
    Route::get('/', function () {
        return view('markets.analysis');
    })->name('markets.analysis');
    Route::get('/technical', function () {
        return view('markets.analysis.technical');
    })->name('markets.analysis.technical');
    Route::get('/fundamental', function () {
        return view('markets.analysis.fundamental');
    })->name('markets.analysis.fundamental');
});

// مسیرهای API
Route::prefix('api')->group(function () {
    Route::get('/gold/prices', [GoldController::class, 'apiPrices']);
    Route::get('/gold/chart', [GoldController::class, 'apiChart']);
    
    Route::get('/silver/prices', [SilverController::class, 'apiPrices']);
    Route::get('/silver/chart', [SilverController::class, 'apiChart']);
    
    Route::get('/crypto/prices', [CryptoController::class, 'apiPrices']);
    Route::get('/crypto/chart', [CryptoController::class, 'apiChart']);
    
    Route::get('/stocks/prices', [StocksController::class, 'apiPrices']);
    Route::get('/stocks/chart', [StocksController::class, 'apiChart']);
});

// مسیر دیباگ
Route::get('/debug/check-json', [App\Http\Controllers\Markets\DebugController::class, 'checkJson']);
