<?php

namespace App\Http\Controllers\Management\Finance;

use App\Events\PaymentCreated;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class ManagePaymentController extends Controller
{
    public function index(){
        // $fees = WorkerFee::get();
        // $fees = WorkerFee::whereHas('order', function ($query) {
        //     $query->where('status', 'completed'); // فقط سفارش‌های تایید‌شده
        // })->latest()->paginate(10);
        $payments = Payment::with('worker')->latest()->paginate(10);
        return view('management.finance.payments.index', compact('payments'));
    }

    public function showWorkers(Request $request){
        $search = $request->input('search');
        // dd($search);
        $workers = User::whereHas('roles', function ($query) {
            $query->where('name', 'worker');
        })
        ->when($search, function ($query, $search) {
            return $query->search($search);
        })
        ->with(['roles']) 
        ->latest()
        ->paginate(10);
        return view('management.finance.payments.show-workers',compact('workers'));
    }

    public function create(User $worker){
        return view('management.finance.payments.create',compact('worker'));
    }

    public function edit(Payment $payment){
        return view('management.finance.payments.edit',compact('payment'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'worker_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'tracking_code' => 'required|string|unique:payments,tracking_code',
            'payment_date' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $jalaliDate = $validated['payment_date'];
        $gregorianDate = Jalalian::fromFormat('Y/m/d', $jalaliDate)->toCarbon();

        // جایگزینی تاریخ میلادی در داده‌های معتبر
        $validated['payment_date'] = $gregorianDate;

        Payment::create($validated);

        $report = Report::firstOrCreate(['worker_id' => $request->worker_id]);
        $total_paid_amount = $report->totalPaidAmountForWorker($request->worker_id);
        $total_credit_amount = $report->totalCreditAmountForWorker($request->worker_id);

        $status = 'balanced';
        if($total_credit_amount > 0){
            $status = 'creditor';
        }elseif($total_credit_amount < 0){
            $status = 'debtor';
        }

        $report->update([
            'total_paid_amount' => $total_paid_amount,
            'total_credit_amount' => $total_credit_amount,
            'status' => $status,
        ]);
        // $report->increment('total_paid_amount', $request->amount);
        // $report->decrement('total_credit_amount', $request->amount);
        // PaymentCreated::dispatch($order);

        return redirect()->route('admin.finance.payments')->with('success', 'پرداخت با موفقیت ثبت شد.');
    }


    public function update(Payment $payment,Request $request)
    {
        // dd($request->tracking_code);
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'tracking_code' => 'required|string|unique:payments,tracking_code,' . $payment->id,
            'payment_date' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $jalaliDate = $validated['payment_date'];
        $gregorianDate = Jalalian::fromFormat('Y/m/d', $jalaliDate)->toCarbon();

        // جایگزینی تاریخ میلادی در داده‌های معتبر
        $validated['payment_date'] = $gregorianDate;

        $payment->update($validated);

        $report = Report::firstOrCreate(['worker_id' => $payment->worker_id]);
        $total_paid_amount = $report->totalPaidAmountForWorker($payment->worker_id);
        $total_credit_amount = $report->totalCreditAmountForWorker($payment->worker_id);

        $status = 'balanced';
        if($total_credit_amount > 0){
            $status = 'creditor';
        }elseif($total_credit_amount < 0){
            $status = 'debtor';
        }

        $report->update([
            'total_paid_amount' => $total_paid_amount,
            'total_credit_amount' => $total_credit_amount,
            'status' => $status,
        ]);

        // $report = Report::firstOrCreate(['worker_id' => $payment->worker_id]);
        // $report->increment('total_paid_amount', $request->amount);
        // $report->decrement('total_credit_amount', $request->amount);

        return redirect()->route('admin.finance.payments')->with('success', 'پرداخت با موفقیت ثبت شد.');
    }
}
