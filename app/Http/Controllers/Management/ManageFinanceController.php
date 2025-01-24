<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\WorkerFee;
use Illuminate\Http\Request;

class ManageFinanceController extends Controller
{
    public function indexPricing(){
        // $fees = WorkerFee::get();
        $fees = WorkerFee::whereHas('order', function ($query) {
            $query->where('status', 'finalized'); // فقط سفارش‌های تایید‌شده
        })->latest()->paginate(10);
        return view('management.finance.pricing.index', compact('fees'));
    }
}
