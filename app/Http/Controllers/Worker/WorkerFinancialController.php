<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\WorkerPayment;
use Illuminate\Http\Request;

class WorkerFinancialController extends Controller
{
    public function index(){
        $report = Report::where('worker_id',auth()->user()->id)->first();
        return view('worker.finance.index', compact('report'));
    }

    public function details(){
        $worker = auth()->user();
        $payments = $worker->payments->map(function ($payment) {
            return [
                'date' => $payment->created_at,
                'amount' => $payment->amount,
                'description' => $payment->description,
                'type' => 'paid', 
            ];
        });

        $fees = $worker->fees->map(function ($fee) {
            return [
                'date' => $fee->created_at,
                'amount' => $fee->amount,
                'description' => $fee->description,
                'type' => 'fee', 
            ];
        });
        
        $details = $fees->merge($payments)->sortByDesc('data');

        return view('worker.finance.details', compact('details'));
    }
}
