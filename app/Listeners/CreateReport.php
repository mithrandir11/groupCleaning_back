<?php

namespace App\Listeners;

use App\Events\OrderCompleted;
use App\Models\Report;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateReport
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
        // $order = $event->order;
        
        // foreach ($order->workers as $worker) {
        //     Report::create([
        //         'order_id' => $worker->id,
        //         'worker_id' => $worker->id,
        //         'income_amount' => $worker->CommissionAmount($order->total_amount),
        //         'credit_amount' => $worker->CommissionAmount($order->total_amount),
        //         'description' => 'برای سفارش #' . $order->order_code,
        //     ]);
        // }
    }
}
