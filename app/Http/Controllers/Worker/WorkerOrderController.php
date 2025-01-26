<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\WorkerOrder;
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
        // $orders = Order::with('user')
        //     ->where('worker_id', auth()->user()->id)
        //     ->when($search, function ($query, $search) {
        //         return $query->search($search);
        //     })
        //     ->latest()
        //     ->paginate(10);

        $worker_orders = WorkerOrder::with('order')
            ->where('worker_id', auth()->user()->id)
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->latest()
            ->paginate(10);

        return view('worker.orders.index', compact('worker_orders'));
    }

    public function show(WorkerOrder $worker_order){
        $order = $worker_order->order;
        $commission_amount = auth()->user()->resume?->commission_rate ?? 0;
        return view('worker.orders.show', compact('order', 'worker_order','commission_amount'));
    }

    public function acceptOrder(WorkerOrder $worker_order){
        // $this->authorize('accept', $order);

        $worker_order->update([
            'status' => 'accepted',
        ]);
        return redirect()->route('worker.orders')->with('success', 'سفارش با موفقیت قبول شد.');
    }

    public function completeOrder(WorkerOrder $worker_order){
        // $this->authorize('accept', $order);
        $worker_order->update([
            'status' => 'completed',
        ]);
        return redirect()->route('worker.orders')->with('success', 'سفارش با موفقیت قبول شد.');
    }
}
