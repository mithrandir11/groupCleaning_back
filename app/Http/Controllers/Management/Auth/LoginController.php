<?php

namespace App\Http\Controllers\Management\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.index');
    }

    public function showLoginFormAdmin()
    {
        return view('auth.admin.login');
    }

    public function showLoginFormWorker()
    {
        return view('auth.worker.login');
    }


    public function loginAdmin(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'اطلاعات وارد شده معتبر نیست.',
        ]);
    }

    public function loginWorker(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            // return redirect()->intended(route('worker.dashboard'));
            return redirect()->route('worker.dashboard');
        }

        return back()->withErrors([
            'error' => 'اطلاعات وارد شده معتبر نیست.',
        ]);
    }

    // خروج کاربر
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
