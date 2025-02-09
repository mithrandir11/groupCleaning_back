<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\User;
use App\Services\GhasedakSmsService;

class OrderObserver
{
    // public function __construct(protected GhasedakSmsService $smsService) {}

    protected $smsService;

    public function __construct(GhasedakSmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        $adminNumbers = User::with('roles')
        ->whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })
        ->pluck('cellphone')
        ->toArray();

        $message = "سفارش جدید ثبت شد! \n کد سفارش: {$order->order_code}\n\nلغو 11";

        foreach ($adminNumbers as $number) {
            $this->smsService->sendSingleSms('09941831687', $message);
        }
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
