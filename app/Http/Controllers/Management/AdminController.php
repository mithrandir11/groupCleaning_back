<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Article;
use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // $menu = Menu::where('id',11)->first();
        $article = Article::with('seo')->where('id',23)->first();
        SEOMeta::setTitle($article->seo->title);
        SEOMeta::setDescription($article->seo->description);
        SEOMeta::setCanonical($article->seo->canonical_url);
        $keywordArray = explode(',', $article->seo->keywords);
        SEOMeta::addKeyword($keywordArray);
        
        return view('management.dashboard' , compact('article'));
    }


    // public function manageOrders()
    // {
    //     $orders = Order::latest()->paginate(10);
    //     return view('management.manage-orders', compact('orders'));
    // }


    // public function show(Order $order){
    //     return view('management.orders.show', compact('order'));
    // }

    // public function findOrderByOrderCode(Request $request){
    //     $request->validate([
    //         'order_code' => 'nullable|string'
    //     ]);

    //     if($request->order_code){
    //         $orders = Order::where('order_code', 'like', "%{$request->order_code}%")->paginate(10);
    //     }else{
    //         return redirect(route('admin.orders'));
    //     }
        
    //     return view('management.manage-orders', compact('orders'));
    // }

    

    // public function managePosts()
    // {
    //     return view('admin.manage-posts');
    // }
}
