<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\HandlesOtp;
use Illuminate\Http\Request;

class WorkerAuthController extends Controller
{
    use HandlesOtp;

    public function __construct()
    {
        $this->roles = ['worker']; 
    }

    public function showLoginForm()
    {
        return view('auth.worker.login');
    }

    public function showVerifyForm()
    {
        return view('auth.worker.verify-otp');
    }
}
