<?php

namespace App\Http\Controllers\Management\Finance;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageReportController extends Controller
{
    public function index(){
        $reports = Report::latest()->paginate(10);
        return view('management.finance.reports.index', compact('reports'));
    }

    public function details(User $worker){
        $details = $worker->payments()
            ->select('created_at as date', 'amount', 'description', DB::raw("'paid' as type"))
            ->union(
                $worker->fees()->select('created_at as date', 'amount', 'description', DB::raw("'fee' as type"))
            )
            ->orderByDesc('date') 
            ->paginate(10);
        return view('management.finance.reports.details', compact('details'));
    }
}
