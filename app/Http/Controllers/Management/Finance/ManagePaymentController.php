<?php

namespace App\Http\Controllers\Management\Finance;


use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class ManagePaymentController extends Controller
{
    public function index(){
        $payments = Payment::with('worker')->latest()->paginate(10);
        return view('management.finance.payments.index', compact('payments'));
    }

    public function showWorkers(Request $request){
        $search = $request->input('search');
        $workers = User::whereHas('roles', function ($query) {
            $query->where('name', 'worker');
        })
        ->when($search, function ($query, $search) {
            return $query->search($search);
        })
        ->with(['roles','resume']) 
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

    public function store(Request $request){
        $validated = $request->validate([
            'worker_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'tracking_code' => 'required|string|unique:payments,tracking_code',
            'payment_date' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $jalaliDate = $validated['payment_date'];
        $gregorianDate = Jalalian::fromFormat('Y/m/d', $jalaliDate)->toCarbon();
        $validated['payment_date'] = $gregorianDate;
        Payment::create($validated);

        $report = Report::firstOrCreate(['worker_id' => $request->worker_id]);
        $total_paid_amount = $report->totalPaidAmountForWorker($request->worker_id);
        $total_credit_amount = $report->totalCreditAmountForWorker($request->worker_id);

        $report->update([
            'total_paid_amount' => $total_paid_amount,
            'total_credit_amount' => $total_credit_amount,
        ]);

        return redirect()->route('admin.finance.payments')->with('success', 'پرداخت با موفقیت ثبت شد.');
    }


    public function update(Payment $payment,Request $request){
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'tracking_code' => 'required|string|unique:payments,tracking_code,' . $payment->id,
            'payment_date' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $jalaliDate = $validated['payment_date'];
        $gregorianDate = Jalalian::fromFormat('Y/m/d', $jalaliDate)->toCarbon();
        $validated['payment_date'] = $gregorianDate;
        $payment->update($validated);

        $report = Report::firstOrCreate(['worker_id' => $payment->worker_id]);
        $total_paid_amount = $report->totalPaidAmountForWorker($payment->worker_id);
        $total_credit_amount = $report->totalCreditAmountForWorker($payment->worker_id);

        $report->update([
            'total_paid_amount' => $total_paid_amount,
            'total_credit_amount' => $total_credit_amount,
        ]);

        return redirect()->route('admin.finance.payments')->with('success', 'پرداخت با موفقیت ثبت شد.');
    }
}
