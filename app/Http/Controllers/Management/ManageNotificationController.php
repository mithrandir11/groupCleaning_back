<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Role;
use Illuminate\Http\Request;

class ManageNotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()->paginate(10);
        return view('management.notifications.index', compact('notifications'));
    }

    public function create()
    {
        $roles = Role::where('name', '!=', 'admin')->get();
        return view('management.notifications.create' , compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'role_id' => 'required|string',
        ]);

      

        $notification = Notification::create([
            'title' => $request->title,
            'message' => $request->message,
            'role_id' => $request->role_id,
            'sender_id' => auth()->id()
        ]);

        // ارسال نوتیفیکیشن Real-Time
        // event(new NewNotification($notification));

        return redirect()->route('admin.notifications')->with('success', 'پیام با موفقیت ارسال شد');
    }



    public function edit(Notification $notification){
        $roles = Role::where('name', '!=', 'admin')->get();
        return view('management.notifications.edit', compact('notification', 'roles'));
    }

    public function update(Request $request, Notification $notification){
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'role_id' => 'required|string',
        ]);
        // dd($validated);

        $notification->update($validated);

        return redirect()->route('admin.notifications')->with('success', 'منو با موفقیت بروزرسانی شد.');
    }


    public function destroy(Notification $notification){
        $notification->delete();
        return redirect()->route('admin.notifications')->with('success', 'آیتم با موفقیت حذف شد.');
    }
}
