<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Role;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function dashboard()
    {
        $role = Role::where('name', 'worker')->first();
        $notifications = Notification::where('role_id',$role->id)->paginate(10);
        return view('worker.dashboard', compact('notifications'));
    }
}
