<?php

namespace App\Http\Controllers\Management;

use App\Exports\FeesExport;
use App\Http\Controllers\Controller;
use App\Models\WorkerFee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ManageFinanceController extends Controller
{
    public function export(Request $request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        return Excel::download(new FeesExport($start_date, $end_date), 'fees.xlsx');
    }


    public function index(Request $request){
        // $fees = WorkerFee::latest()->paginate(10);
        $search = $request->input('search');
        $fees = WorkerFee::with('order')
        ->when($search, function ($query, $search) {
            return $query->search($search);
        })
        ->latest()
        ->paginate(10);

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
