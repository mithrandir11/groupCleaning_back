<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\HandlesOtp;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    use HandlesOtp;

    public function __construct()
    {
        $this->roles = ['admin','operator']; 
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    public function showVerifyForm()
    {
        return view('auth.admin.verify-otp');
    }
}
