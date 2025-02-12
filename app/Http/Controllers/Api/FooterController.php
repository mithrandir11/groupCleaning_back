<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FooterController extends Controller
{
    public function index(){
        $footers = Footer::get();
        return Response::success(null, $footers);   
    }
}
