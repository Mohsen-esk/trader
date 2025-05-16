<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * نمایش پروفایل کاربر
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
    
    /**
     * نمایش فرم ویرایش پروفایل
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
    
    /**
     * به‌روزرسانی اطلاعات پروفایل
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'bio' => ['nullable', 'string', 'max:1000'],
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        
        // آپلود تصویر پروفایل
        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ]);
            
            // حذف تصویر قبلی اگر وجود داشته باشد
            if ($user->avatar && $user->avatar != 'default-avatar.png') {
                Storage::disk('public')->delete('avatars/' . $user->avatar);
            }
            
            // ذخیره تصویر جدید
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('avatars', $avatarName, 'public');
            $user->avatar = $avatarName;
        }
        
        $user->save();
        
        return redirect()->route('profile.index')->with('success', 'پروفایل با موفقیت به‌روزرسانی شد.');
    }
    
    /**
     * نمایش فرم تغییر رمز عبور
     */
    public function changePassword()
    {
        return view('profile.change-password');
    }
    
    /**
     * به‌روزرسانی رمز عبور
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = Auth::user();
        
        // بررسی رمز عبور فعلی
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'رمز عبور فعلی صحیح نیست.']);
        }
        
        // به‌روزرسانی رمز عبور
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('profile.index')->with('success', 'رمز عبور با موفقیت تغییر کرد.');
    }
    
    /**
     * نمایش تنظیمات حساب کاربری
     */
    public function settings()
    {
        $user = Auth::user();
        return view('profile.settings', compact('user'));
    }
    
    /**
     * به‌روزرسانی تنظیمات حساب کاربری
     */
    public function updateSettings(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'notification_email' => ['nullable', 'boolean'],
            'notification_sms' => ['nullable', 'boolean'],
            'notification_push' => ['nullable', 'boolean'],
            'theme' => ['required', 'string', 'in:light,dark,auto'],
            'language' => ['required', 'string', 'in:fa,en'],
        ]);
        
        // ذخیره تنظیمات در جدول settings یا preferences
        $user->settings = [
            'notification_email' => $request->has('notification_email'),
            'notification_sms' => $request->has('notification_sms'),
            'notification_push' => $request->has('notification_push'),
            'theme' => $request->theme,
            'language' => $request->language,
        ];
        
        $user->save();
        
        return redirect()->route('profile.settings')->with('success', 'تنظیمات با موفقیت به‌روزرسانی شد.');
    }
    
    /**
     * نمایش علاقه‌مندی‌ها
     */
    public function favorites()
    {
        $user = Auth::user();
        // دریافت علاقه‌مندی‌های کاربر از دیتابیس
        $favorites = []; // این قسمت باید با داده‌های واقعی پر شود
        
        return view('profile.favorites', compact('favorites'));
    }
    
    /**
     * نمایش تاریخچه فعالیت‌ها
     */
    public function activities()
    {
        $user = Auth::user();
        // دریافت فعالیت‌های کاربر از دیتابیس
        $activities = []; // این قسمت باید با داده‌های واقعی پر شود
        
        return view('profile.activities', compact('activities'));
    }
}