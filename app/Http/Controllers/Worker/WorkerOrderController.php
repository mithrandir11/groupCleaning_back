<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class WorkerOrderController extends Controller
{
    // public function index()
    // {
    //     $orders = Order::where('worker_id', auth()->user()->id)->latest()->paginate(10);
    //     return view('worker.orders.index', compact('orders'));
    // }

    public function index(Request $request){
        $search = $request->input('search');
        $orders = Order::with('user')
            ->where('worker_id', auth()->user()->id)
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->latest()
            ->paginate(10);

        return view('worker.orders.index', compact('orders'));
    }
}
