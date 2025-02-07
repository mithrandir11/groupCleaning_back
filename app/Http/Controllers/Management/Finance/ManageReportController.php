<?php

namespace App\Http\Controllers\Management\Finance;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ManageReportController extends Controller
{
    public function index(){
        $reports = Report::latest()->paginate(10);
        return view('management.finance.reports.index', compact('reports'));
    }

    public function details(User $worker){
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
        return view('management.finance.reports.details', compact('details'));
    }
}
