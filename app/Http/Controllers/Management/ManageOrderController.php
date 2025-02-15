<?php

namespace App\Http\Controllers\Management;

use App\Events\OrderCompleted;
use App\Http\Controllers\Controller;
use App\Listeners\CreateReport;
use App\Models\Order;
use App\Models\User;
use App\Models\WorkerFee;
use Illuminate\Http\Request;

class ManageOrderController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $orders = Order::with(['workers','user'])
        ->when($search, function ($query, $search) {
            return $query->search($search);
        })
        ->latest()
        ->paginate(10);
        
        return view('management.orders.index', compact('orders'));
    }


    public function show(Order $order){
        return view('management.orders.show', compact('order'));
    }

    public function acceptOrder(Order $order){
        $order->update([
            'status' => 'accepted',
        ]);
        return redirect()->back()->with('success', 'عملیات با موفقیت انجام شد');
    }

    public function completeOrder(Order $order){
        $order->update([
            'status' => 'completed',
        ]);
        OrderCompleted::dispatch($order);
        log_activity('اتمام سفارش', "سفارش با شناسه {$order->order_code}  به اتمام رسید.");
        return redirect()->route('admin.orders')->with('success', 'سفارش با موفقیت قبول شد.');
    }

    public function cancelOrder(Order $order){
        $order->update([
            'status' => 'canceled',
        ]);
        log_activity('لغو سفارش', "سفارش با شناسه {$order->order_code}   لغو شد.");
        return redirect()->route('admin.orders')->with('success', 'سفارش با موفقیت لغو شد.');
    }

    public function setOrderPrice(Request $request, Order $order){
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);
        $order->update([
            'total_amount' => $request->amount,
        ]);
        log_activity('تخصیص هزینه', "سفارش با کد $order->order_code به مبلغ $request->amount قیمت گذاری شد.");
        return redirect()->back()->with('success', 'عملیات با موفقیت انجام شد');
    }




    public function showAssignOrderToWorker(Request $request, Order $order){
        $search = $request->input('search');
        $workers = User::whereHas('roles', function ($query) {
            $query->where('name', 'worker');
        })
        ->with(['roles','resume']) 
        ->when($search, function ($query, $search) {
            return $query->search($search);
        })
        ->latest()
        ->paginate(10);
        $assignedWorkerIds = $order->workers->pluck('id')->toArray();
        $workers->getCollection()->transform(function ($worker) use ($assignedWorkerIds) {
            $worker->has_order = in_array($worker->id, $assignedWorkerIds);
            return $worker;
        });
        $workers->setCollection(
            $workers->getCollection()->sortByDesc('has_order')
        );
        return view('management.orders.assignToWorker', compact('workers', 'order'));
    }



    public function assignToWorkers(Request $request, Order $order)
    {
        $request->validate([
            'worker_id' => 'required|exists:users,id',
            'operator_notes' => 'nullable|string',
        ]);

        $order->workers()->attach($request->worker_id, [
            'assigned_at' => now(),
            'status' => 'pending',
            'operator_notes' => $request->operator_notes,
        ]);

        $order->status = 'processing';
        $order->save();
        log_activity('ارجاع به متخصص', "سفارش با شناسه {$order->order_code} به متخصص با کد $request->worker_id ارجاع داده شد.");

        return redirect()->back()->with('success', 'عملیات با موفقیت انجام شد');
    }
}
