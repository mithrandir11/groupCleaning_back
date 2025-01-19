<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuController extends Controller
{
    public function index(){
        // $menus = Menu::with('children')->whereNull('parent_id')->get();
        $menus = Menu::whereNull('parent_id')
        ->with('children.children') // دریافت فرزندان به صورت بازگشتی
        ->get();
        return Response::success(null, $menus);
    }

    public function show($path){
       
        $slugs = explode('/', $path); // مسیر را به آرایه تبدیل کن
        $menu = Menu::where('slug', end($slugs))->with(['faqs','suggestedPages'])->firstOrFail(); // آخرین اسلاگ
        if (!$menu) {
            return Response::error('menu not found');
        }

        return Response::success(null, $menu);

    }
}
