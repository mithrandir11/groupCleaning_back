<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class NotificationController extends Controller
{
    public function index(){
        $role = Role::where('name', 'customer')->first();
        $notifications = Cache::remember('notifications', 3600, function () use ($role) { // 3600 ثانیه (1 ساعت)
            return Notification::where('role_id', $role->id)->paginate(10);
        });

       
        // $notifications = Notification::where('role_id',$role->id)->paginate(10);
        
        return Response::success(null, $notifications);
    }
}
