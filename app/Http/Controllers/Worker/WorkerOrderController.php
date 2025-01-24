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

    public function show(Order $order){
        return view('worker.orders.show', compact('order'));
    }

    public function acceptOrder(Order $order){
        // $this->authorize('accept', $order);

        // DB::transaction(function () use ($order) {
            // به‌روزرسانی وضعیت سفارش
            $order->update([
                'status' => 'accepted',
                // 'worker_id' => auth()->id(), // اختصاص سفارش به نیروی کار فعلی
            ]);
        // });

        return redirect()->route('worker.orders')->with('success', 'سفارش با موفقیت قبول شد.');
    }

    public function completeOrder(Order $order){
        // $this->authorize('accept', $order);

        // DB::transaction(function () use ($order) {
            // به‌روزرسانی وضعیت سفارش
            $order->update([
                'status' => 'completed',
                // 'worker_id' => auth()->id(), // اختصاص سفارش به نیروی کار فعلی
            ]);
        // });

        return redirect()->route('worker.orders')->with('success', 'سفارش با موفقیت قبول شد.');
    }
}
