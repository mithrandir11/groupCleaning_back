<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\WorkerFee;
use Illuminate\Http\Request;

class ManageFinanceController extends Controller
{
    public function indexPricing(){
        // $fees = WorkerFee::get();
        // $fees = WorkerFee::whereHas('order', function ($query) {
        //     $query->where('status', 'completed'); // فقط سفارش‌های تایید‌شده
        // })->latest()->paginate(10);
        $fees = WorkerFee::latest()->paginate(10);
        return view('management.finance.pricing.index', compact('fees'));
    }

    public function showPricing(WorkerFee $fee){
        return view('management.finance.pricing.show', compact('fee'));
    }

    public function applyPenalty(WorkerFee $fee, Request $request)
    {
        $request->validate([
            'penalty_amount' => 'required|numeric|min:0',
        ]);

        $fee->penalty_amount = $request->penalty_amount;
        $fee->save();
        return redirect()->route('admin.finance.pricing')->with('success', 'عملیات با موفقیت انجام شد.');
    }
}
