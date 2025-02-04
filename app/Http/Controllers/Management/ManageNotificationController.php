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
        $notifications = Notification::paginate(10);
        return view('management.notifications.index', compact('notifications'));
    }

    public function showSend()
    {
        $roles = Role::where('name', '!=', 'admin')->get();
        return view('management.notifications.send' , compact('roles'));
    }

    public function send(Request $request){
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
}
