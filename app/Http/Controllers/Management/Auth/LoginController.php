<?php

namespace App\Http\Controllers\Management\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\error;

class LoginController extends Controller
{
    // public function showLogin()
    // {
    //     return view('auth.index');
    // }

    // public function logout(Request $request){
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/');
    // }

    // public function showLoginFormAdmin()
    // {
    //     return view('auth.admin.login');
    // }

    // public function verifyOtpShow()
    // {
    //     return view('auth.admin.verify-otp');
    // }

    // public function showLoginFormWorker()
    // {
    //     return view('auth.worker.login');
    // }


    // public function sendOtp(Request $request){
    //     // اعتبارسنجی شماره تلفن
    //     $request->validate([
    //         'cellphone' => ['required', 'regex:/^(\+98|0)?9\d{9}$/']
    //     ]);
    
    //     // یافتن کاربر با شماره تلفن
    //     $user = User::where('cellphone', $request->cellphone)->first();
    
    //     // بررسی نقش مدیر
    //     if (!$user || !$user->hasRole('admin')) {
    //         return back()->withErrors(['cellphone' => 'شماره تلفن وارد شده معتبر نیست یا به نقش مدیر اختصاص ندارد.']);
    //     }
    
    //     // تولید کد OTP و تنظیم زمان انقضای آن
    //     $OTPCode = mt_rand(100000, 999999);
    //     // $loginToken = Str::random(40); // توکن موقت
    //     $expiresAt = now()->addMinutes(5); // کد OTP به مدت 5 دقیقه اعتبار دارد
    
    //     // به‌روزرسانی اطلاعات کاربر
    //     $user->update([
    //         'otp' => $OTPCode,
    //         'otp_expires_at' => $expiresAt,
    //         // 'login_token' => $loginToken,
    //     ]);
    
    //     // ارسال کد OTP (می‌توانید از سرویس ارسال پیامک استفاده کنید)
    //     // (new OtpService(new GhasedakSmsService))->sendOtp($user, $OTPCode);
    
    //     return redirect()->route('admin.auth.verify-otp-show')->with('success', 'کد OTP با موفقیت ارسال شد.');
    // }

    // public function verifyOtp(Request $request){
    //     // اعتبارسنجی کد OTP
    //     $request->validate([
    //         'otp' => 'required|digits:6',
    //     ]);

    //     // یافتن کاربر بر اساس شماره تلفن و کد OTP
    //     $user = User::where('cellphone', session('cellphone'))->firstOrFail();

    //     // بررسی زمان انقضای کد OTP
    //     if ($user->otp_expires_at && $user->otp_expires_at->isPast()) {
    //         return back()->withErrors(['otp' => 'کد OTP منقضی شده است.']);
    //     }
        
    //     dd('df');
    //     // بررسی کد OTP
    //     if ($user->otp == $request->otp) {
    //         // حذف کد OTP و زمان انقضای آن بعد از موفقیت
    //         $user->update([
    //             'otp' => null,
    //             'otp_expires_at' => null,
    //         ]);

    //         // ورود کاربر به پنل مدیریت
    //         Auth::login($user);

    //         // return redirect()->route('admin.dashboard')->with('success', 'ورود با موفقیت انجام شد.');
    //     } else {
    //         // return back()->withErrors(['otp' => 'کد OTP نادرست است.']);
    //     }
    // }

    // public function resendOtp(Request $request)
    // {
    //     // اعتبارسنجی login_token
    //     $request->validate([
    //         'login_token' => 'required|string',
    //     ]);

    //     try {
    //         // یافتن کاربر بر اساس login_token
    //         $user = User::where('login_token', $request->login_token)->firstOrFail();

    //         // بررسی نقش مدیر
    //         if (!$user->hasRole('admin')) {
    //             return Response::error('شما به پنل مدیریت دسترسی ندارید.');
    //         }

    //         // تولید کد OTP جدید و تنظیم زمان انقضای آن
    //         $OTPCode = mt_rand(100000, 999999);
    //         $loginToken = Hash::make('DCDCojncd@cdjn%!!ghnjrgtn&&');
    //         $expiresAt = now()->addMinutes(5); // کد OTP به مدت 5 دقیقه اعتبار دارد

    //         // به‌روزرسانی اطلاعات کاربر
    //         $user->update([
    //             'otp' => $OTPCode,
    //             'otp_expires_at' => $expiresAt,
    //             'login_token' => $loginToken,
    //         ]);

    //         // ارسال کد OTP جدید
    //         // (new OtpService(new GhasedakSmsService))->sendOtp($user, $OTPCode);

    //         return Response::success(null, [
    //             'message' => 'کد OTP جدید با موفقیت ارسال شد.',
    //             'login_token' => $loginToken,
    //         ]);
    //     } catch (\Exception $e) {
    //         return Response::error($e->getMessage());
    //     }
    // }





    // public function loginAdmin(Request $request){
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($credentials, $request->remember)) {
    //         $request->session()->regenerate();
    //         return redirect()->route('admin.dashboard');
    //     }

    //     return back()->withErrors([
    //         'email' => 'اطلاعات وارد شده معتبر نیست.',
    //     ]);
    // }

    // public function loginWorker(Request $request){
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($credentials, $request->remember)) {
    //         $request->session()->regenerate();
    //         return redirect()->route('worker.dashboard');
    //     }

    //     return back()->withErrors([
    //         'error' => 'اطلاعات وارد شده معتبر نیست.',
    //     ]);
    // }

   
    
}
