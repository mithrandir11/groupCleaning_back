<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageFinanceController extends Controller
{
    public function indexPricing(){
        return view('management.finance.pricing.index');
    }
}
