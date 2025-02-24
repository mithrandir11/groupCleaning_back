<?php

namespace App\Traits;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

trait HandlesOtp
{
    protected $roles; // نقش کاربر (admin یا worker)

    // public function __construct()
    // {
    //     $this->loginTokenSecret = 'DKT324CDCojncd@cdjn%!!ghnjrgtn&&';
    // }

    /**
     * فرستادن کد OTP
     */
    public function sendOtp(Request $request)
    {
       
        
        $request->validate([
            'cellphone' => ['required', 'regex:/^(\+98|0)?9\d{9}$/']
        ]);

        $user = User::where('cellphone', $request->cellphone)->first();
        
        if (!$user || !$user->hasAnyRole($this->roles)) {
            return back()->withErrors(['cellphone' => 'کاربری با این شماره همراه یافت نشد.']);
        }
    

        $OTPCode = mt_rand(100000, 999999);
        $loginToken = Hash::make('DKT324CDCojncd@cdjn%!!ghnjrgtn&&');


        $user->update([
            'otp' => $OTPCode,
            'login_token' => $loginToken,
        ]);

        // ذخیره login_token در Session
        Session::put('login_token', $loginToken);
        Session::put('otp', $OTPCode);

        // dd($user->hasAnyRole(['admin','operator']));
        // try {
            // (new OtpService(new GhasedakSmsService))->sendOtp($user, $OTPCode);
            // return redirect()->route('otp.verify')->with('success', 'کد OTP به شماره شما ارسال شد.');
            if ($user->hasAnyRole(['admin','operator'])) {
                return redirect()->route('admin.verify.otp')->with('success', 'ورود موفق.');
            } elseif ($user->hasAnyRole('worker')) {
                return redirect()->route('worker.verify.otp')->with('success', 'ورود موفق.');
            } else {
                return back()->withErrors(['error' => 'نقش کاربر معتبر نیست.']);
            }
        // } catch (Exception $e) {
        //     return back()->withErrors(['cellphone' => 'خطایی در ارسال کد OTP رخ داد.']);
        // }
    }

    /**
     * اعتبارسنجی کد OTP
     */
    public function verifyOtp(Request $request)
    {
        
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        // خواندن login_token از Session
        $loginToken = Session::get('login_token');
        if (!$loginToken) {
            return back()->withErrors(['otp' => 'لطفاً ابتدا کد تایید دریافت کنید.']);
        }
      

        // یافتن کاربر بر اساس login_token
        $user = User::where('login_token', $loginToken)->first();
     

        if (!$user || !$user->hasAnyRole($this->roles)) {
            return back()->withErrors(['otp' => 'کاربر معتبری پیدا نشد.']);
        }
        // dd($user->otp, $request->otp);
       
        // اعتبارسنجی کد OTP
        if ($user->otp == $request->otp) {
            
            // ورود کاربر
            Auth::login($user);
            

            // پاک کردن OTP و login_token بعد از ورود موفق
            $user->update([
                'otp' => null,
                'login_token' => null,
            ]);
            

            // پاک کردن Session
            Session::forget('login_token');

            // هدایت کاربر به پنل مورد نظر
            if ($user->hasAnyRole(['admin','operator'])) {
                return redirect()->route('admin.dashboard')->with('success', 'ورود موفق.');
            } elseif ($user->hasAnyRole('worker')) {
                return redirect()->route('worker.dashboard')->with('success', 'ورود موفق.');
            } else {
                return back()->withErrors(['otp' => 'نقش کاربر معتبر نیست.']);
            }
        } else {
            return back()->withErrors(['otp' => 'کد تایید نادرست است.']);
        }
    }

    /**
     * ارسال مجدد کد OTP
     */
    public function resendOtp()
    {
        // خواندن login_token از Session
        $loginToken = Session::get('login_token');
        if (!$loginToken) {
            return back()->withErrors(['otp' => 'لطفاً ابتدا کد تایید دریافت کنید.']);
        }

        // یافتن کاربر بر اساس login_token
        $user = User::where('login_token', $loginToken)->first();

        if (!$user || !$user->hasAnyRole($this->roles)) {
            return back()->withErrors(['otp' => 'کاربر معتبری پیدا نشد.']);
        }

        // تولید کد OTP جدید
        $OTPCode = mt_rand(100000, 999999);
        $user->update(['otp' => $OTPCode]);

        // ارسال کد OTP جدید
        try {
            // (new OtpService(new GhasedakSmsService))->sendOtp($user, $OTPCode);
            return back()->with('success', 'کد تایید جدید به شماره شما ارسال شد.');
        } catch (Exception $e) {
            return back()->withErrors(['otp' => 'خطایی در ارسال کد تایید رخ داد.']);
        }
    }
}
