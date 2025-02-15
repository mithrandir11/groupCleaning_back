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
        $setting->update($validated);
        return redirect()->route('admin.settings')->with('success', 'آیتم با موفقیت بروزرسانی شد.');
    }
}
