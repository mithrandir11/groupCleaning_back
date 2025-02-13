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
        // dd($order->workers);
        return view('management.orders.show', compact('order'));
    }

    public function acceptOrder(Order $order){
        // $this->authorize('accept', $order);

        $order->update([
            'status' => 'accepted',
        ]);

        return redirect()->back()->with('success', 'عملیات با موفقیت انجام شد');
        // return redirect()->route('admin.orders')->with('success', 'سفارش با موفقیت قبول شد.');
    }

    public function completeOrder(Order $order){
        // $this->authorize('accept', $order);
        $order->update([
            'status' => 'completed',
        ]);

        OrderCompleted::dispatch($order);
        log_activity('اتمام سفارش', "سفارش با شناسه {$order->order_code}  به اتمام رسید.");
        return redirect()->route('admin.orders')->with('success', 'سفارش با موفقیت قبول شد.');
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




    public function showAssignOrderToWorker(Order $order){
        $order->load('workers');
        $workers = User::whereHas('roles', function ($query) {
            $query->where('name', 'worker');
        })
        ->with(['roles','resume']) 
        ->latest()
        ->paginate(10);

        $assignedWorkerIds = $order->workers->pluck('id')->toArray();

        $workers->getCollection()->transform(function ($worker) use ($assignedWorkerIds) {
            $worker->has_order = in_array($worker->id, $assignedWorkerIds);
            return $worker;
        });

            // اضافه کردن فیلد محاسباتی `has_order` به هر کارگر
        // $workers->getCollection()->transform(function ($worker) use ($order) {
        //     $worker->has_order = $order->workers->contains($worker->id);
        //     return $worker;
        // });

        // مرتب‌سازی کارگران بر اساس `has_order` (کارگرانی که قبلاً ارجاع شده‌اند در بالای لیست)
        $workers->setCollection(
            $workers->getCollection()->sortByDesc('has_order')
        );

        return view('management.orders.assignToWorker', compact('workers', 'order'));
    }



    public function assignToWorkers(Request $request, Order $order)
    {
        // dd($request->all());

        $request->validate([
            'worker_id' => 'required|exists:users,id',
            'operator_notes' => 'nullable|string',
        ]);

        // ارجاع سفارش به نیروی کار
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
