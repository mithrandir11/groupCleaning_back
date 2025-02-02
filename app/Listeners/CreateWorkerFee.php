<?php

namespace App\Listeners;

use App\Events\OrderCompleted;
use App\Models\Report;
use App\Models\WorkerFee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateWorkerFee
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCompleted $event): void
    {
        $order = $event->order;
        

        // محاسبه مبلغ حق‌الزحمه بر اساس کمیسیون نیروی کار
        // $commissionRate = $order->worker->commission_rate; // فرض کنید کمیسیون در مدل Worker ذخیره شده است
        // $amount = $order->total_amount * ($commissionRate / 100);

        // ایجاد رکورد در جدول worker_fees
        foreach ($order->workers as $worker) {
            $workerFee = WorkerFee::create([
                'order_id' => $order->id,
                'worker_id' => $worker->id,
                'amount' => $worker->CommissionAmount($order->total_amount),
                'description' => 'حق‌الزحمه برای سفارش #' . $order->order_code,
            ]);

            $report = Report::firstOrCreate(['worker_id' => $worker->id]);
            
            // افزایش مقدار total_income_amount به اندازه مبلغ حق‌الزحمه ثبت شده
            $report->increment('total_income_amount', $workerFee->amount);
            $report->increment('total_credit_amount', $workerFee->amount);
        }
        
        // dd($gg);
    }
}
