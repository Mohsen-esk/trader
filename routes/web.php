<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// صفحه اصلی
Route::get('/', function () {
    return view('home');
})->name('home');

// مسیرهای احراز هویت
Route::middleware('guest')->group(function () {
    // ورود
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    
    // ثبت نام
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    
    // فراموشی رمز عبور
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// مسیرهای مختص کاربران احراز هویت شده
Route::middleware('auth')->group(function () {
    // خروج
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // داشبورد
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // پروفایل کاربر
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('update');
        Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');
        Route::post('/settings/update', [ProfileController::class, 'updateSettings'])->name('settings.update');
        Route::get('/favorites', [ProfileController::class, 'favorites'])->name('favorites');
        Route::get('/activities', [ProfileController::class, 'activities'])->name('activities');
    });
});

// مسیرهای بازار (قابل دسترسی برای همه)
Route::prefix('markets')->name('markets.')->group(function () {
    Route::get('/gold', [MarketController::class, 'gold'])->name('gold');
    Route::get('/silver', [MarketController::class, 'silver'])->name('silver');
    Route::get('/crypto', [MarketController::class, 'crypto'])->name('crypto');
    Route::get('/stocks', [MarketController::class, 'stocks'])->name('stocks');
});