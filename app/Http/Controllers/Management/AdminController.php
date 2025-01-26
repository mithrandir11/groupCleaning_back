<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('management.dashboard');
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
