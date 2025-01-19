<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SuggestedPageController extends Controller
{
    public function index($menuId)
    {
        $suggestedPages = Menu::findOrFail($menuId)->suggestedPages;
        return Response::success(null, $suggestedPages);
    }
}
