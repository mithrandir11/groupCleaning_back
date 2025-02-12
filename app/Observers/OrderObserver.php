<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\Setting;
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
        // $adminNumbers = User::with('roles')
        // ->whereHas('roles', function ($query) {
        //     $query->where('name', 'admin');
        // })
        // ->pluck('cellphone')
        // ->toArray();

        $message = "سفارش جدید ثبت شد! \n کد سفارش: {$order->order_code}\n\nلغو 11";

        $adminPhoneNumber = Setting::where('key', 'admin_phone_number')->value('value');
        if($adminPhoneNumber) $this->smsService->sendSingleSms($adminPhoneNumber, $message);

        log_activity('ثبت سفارش', "سفارش با شناسه {$order->order_code} ثبت شد.");
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
