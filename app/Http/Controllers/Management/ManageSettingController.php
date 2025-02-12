<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ManageSettingController extends Controller
{
    public function index(Request $request){
        $settings = Setting::latest()->paginate(10);
        return view('management.settings.index', compact('settings'));
    }

    public function edit(Setting $setting){
        return view('management.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting){
        $validated = $request->validate([
            'value' => 'required|string|max:100',
            'description' => 'nullable|string|max:250',
        ]);
        // dd($setting);
        $setting->update($validated);
        return redirect()->route('admin.settings')->with('success', 'آیتم با موفقیت بروزرسانی شد.');
    }

    // public function edit()
    // {
    //     // دریافت تنظیم شماره ادمین
    //     $setting = Setting::where('key', 'admin_phone_number')->first();

    //     return view('admin.settings.edit-admin-phone', compact('setting'));
    // }

    // public function update(Request $request)
    // {
    //     // اعتبارسنجی ورودی
    //     $validated = $request->validate([
    //         'value' => 'required|string|digits:11|regex:/^09[0-9]{9}/', // شماره تلفن باید 11 رقمی و با 09 شروع شود
    //     ]);

    //     // به‌روزرسانی تنظیم شماره ادمین
    //     $setting = Setting::where('key', 'admin_phone_number')->first();
    //     if ($setting) {
    //         $setting->update(['value' => $validated['value']]);
    //     } else {
    //         Setting::create([
    //             'key' => 'admin_phone_number',
    //             'value' => $validated['value'],
    //         ]);
    //     }

    //     return redirect()->route('admin.settings.edit-admin-phone')->with('success', 'شماره ادمین با موفقیت به‌روزرسانی شد.');
    // }
}
