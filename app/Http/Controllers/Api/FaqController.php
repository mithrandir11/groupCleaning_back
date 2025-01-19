<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FaqController extends Controller
{
    public function index($menuId)
    {
        $faqs = Menu::findOrFail($menuId)->faqs;
        return Response::success(null, $faqs);
    }
}
