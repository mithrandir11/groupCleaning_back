<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::with('children')->whereNull('parent_id')->get();
        return Response::success(null, $menus);
    }

    public function show($path){
       
        $slugs = explode('/', $path); // مسیر را به آرایه تبدیل کن
        $menu = Menu::with('children')->where('slug', end($slugs))->firstOrFail(); // آخرین اسلاگ
        if (!$menu) {
            return Response::error('menu not found');
        }

        return Response::success(null, $menu);

    }
}
