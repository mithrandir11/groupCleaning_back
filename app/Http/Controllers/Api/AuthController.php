<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request){
        $request->validate([
            'cellphone' => ['required', 'regex:/^(\+98|0)?9\d{9}$/']
        ]);
        $user = User::where('cellphone', $request->cellphone)->first();
        $OTPCode = mt_rand(100000, 999999);
        $loginToken = Hash::make('DCDCojncd@cdjn%!!ghnjrgtn&&');

        if ($user) {
            $user->update([
                'otp' => $OTPCode,
                'login_token' => $loginToken
            ]);
        } else {
            $user = User::Create([
                'cellphone' => $request->cellphone,
                'otp' => $OTPCode,
                'login_token' => $loginToken
            ]);
        }

        // (new OtpService(new GhasedakSmsService))->sendOtp($user, $OTPCode);


        // return Response::success(null, ['login_token' => $loginToken]);
        return Response::success(null, ['login_token' => $loginToken, 'otp' => $OTPCode]);
    }


    public function checkOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
            'login_token' => 'required|string'
        ]);

        $user = User::where('login_token', $request->login_token)->firstOrFail();

        if ($user->otp == $request->otp) {
            $token = $user->createToken('myApp', ['user'])->plainTextToken;
            return Response::success(null, ['user'=> $user, 'token' => $token]);
        } else {
            return Response::error('کد ورود نادرست است');
        }
    }


    public function resendOtp(Request $request)
    {
        $request->validate([
            'login_token' => 'required|string'
        ]);

        try {
            $user = User::where('login_token', $request->login_token)->firstOrFail();
            $OTPCode = mt_rand(100000, 999999);
            $loginToken = Hash::make('DCDCojncd@cdjn%!!ghnjrgtn&&');
    
            $user->update([
                'otp' => $OTPCode,
                'login_token' => $loginToken
            ]);
            return Response::success(null, ['login_token' => $loginToken]);
        } catch (Exception $e) {
            return Response::error($e->getMessage());
        }

       
    }


    public function me()
    {
        $user = User::find(Auth::id());
        if($user) return Response::success(null, $user);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return Response::success('logged out');
    }
}
