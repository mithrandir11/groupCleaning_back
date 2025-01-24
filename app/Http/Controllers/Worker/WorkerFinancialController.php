<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\WorkerPayment;
use Illuminate\Http\Request;

class WorkerFinancialController extends Controller
{
    public function index(){
        $user_id = auth()->user()->id;
        
        $payments = WorkerPayment::with('worker')
            ->where('worker_id', $user_id)
            ->latest()
            ->paginate(10);

        $totalPaid = WorkerPayment::where('worker_id', $user_id)->where('status', 'paid')->sum('amount');
        $totalUnpaid = WorkerPayment::where('worker_id', $user_id)->where('status', 'unpaid')->sum('amount');
        $balance = $totalUnpaid > 0 ? 'بستانکار' : 'صاف';

            // dd($payments);

        return view('worker.finance.index', compact('payments','balance','totalPaid','totalUnpaid'));
    }
}
