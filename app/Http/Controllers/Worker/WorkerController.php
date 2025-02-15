<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function dashboard()
    {
        $role = Role::where('name', 'worker')->first();
        $notifications = Notification::where('role_id',$role->id)->paginate(10);
        return view('worker.dashboard', compact('notifications'));
    }

    public function info()
    {
        $user = User::with('resume')->where('id', auth()->user()->id)->first();
        return view('worker.info', compact('user'));
    }

    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'family' => 'nullable|string|max:100',
        ]);

        $user = auth()->user();

        try {
            $user->update($validated);
            return redirect()->back()->with('success', 'اطلاعات کاربر با موفقیت به‌روزرسانی شد.');
        } catch (\Exception  $e) {
            return redirect()->back()->with('error', 'خطا در به‌روزرسانی اطلاعات کاربر.');
        }
    }
}
