<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Article;
use App\Models\Order;
use App\Models\User;
use App\Services\GhasedakSmsService;
use App\Services\OtpService;
use Artesaos\SEOTools\Facades\SEOMeta;


class AdminController extends Controller
{
    public function dashboard(){
        $activities = Activity::latest()->paginate(10);
        return view('management.dashboard' , compact('activities'));
    }
}
