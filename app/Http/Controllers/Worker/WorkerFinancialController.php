<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\WorkerPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkerFinancialController extends Controller
{
    public function index(){
        $report = Report::where('worker_id',auth()->user()->id)->first();
        $worker_id = auth()->user()->id;
        return view('worker.finance.index', compact('report','worker_id'));
    }

    public function details()
    {
        // کاربر فعلی
        $worker = auth()->user();

        $details = $worker->payments()
            ->select('created_at as date', 'amount', 'description', DB::raw("'paid' as type"))
            ->union(
                $worker->fees()->select('created_at as date', 'amount', 'description', DB::raw("'fee' as type"))
            )
            ->orderByDesc('date') 
            ->paginate(10);

        return view('worker.finance.details', compact('details'));
    }

    // public function details(){
    //     $worker = auth()->user();
    //     $payments = $worker->payments->map(function ($payment) {
    //         return [
    //             'date' => $payment->created_at,
    //             'amount' => $payment->amount,
    //             'description' => $payment->description,
    //             'type' => 'paid', 
    //         ];
    //     });

    //     $fees = $worker->fees->map(function ($fee) {
    //         return [
    //             'date' => $fee->created_at,
    //             'amount' => $fee->amount,
    //             'description' => $fee->description,
    //             'type' => 'fee', 
    //         ];
    //     });
        
    //     $details = $fees->merge($payments)->sortByDesc('data');

    //     return view('worker.finance.details', compact('details'));
    // }

    
}
