<?php

namespace App\Http\Controllers\Management\Finance;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ManageReportController extends Controller
{
    public function index(){
        $reports = Report::latest()->paginate(10);
        return view('management.finance.reports.index', compact('reports'));
    }
}
