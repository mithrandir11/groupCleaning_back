<?php

namespace App\Exports;

use App\Models\WorkerFee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Morilog\Jalali\Jalalian;

class FeesExport implements FromCollection, WithHeadings
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date = null, $end_date = null)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        // تبدیل تاریخ شمسی به میلادی
        $startDate = $this->start_date ? Jalalian::fromFormat('Y/m/d', $this->start_date)->toCarbon() : null;
        $endDate = $this->end_date ? Jalalian::fromFormat('Y/m/d', $this->end_date)->toCarbon() : null;

        // بازگرداندن لیست قیمت‌ها با فیلتر بر اساس تاریخ
        return WorkerFee::with(['order.service', 'worker'])
            ->when($startDate, function ($query) use ($startDate) {
                $query->whereDate('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                $query->whereDate('created_at', '<=', $endDate);
            })
            ->get()
            ->map(function ($fee) {
                return [
                    'order_code' => $fee->order->order_code,
                    'service_title' => $fee->order->service->title_fa . ' - ' . $fee->order->service_type,
                    'worker_name' => $fee->worker->name,
                    'worker_id' => $fee->worker->id,
                    'amount' => number_format($fee->amount),
                    'penalty_amount' => number_format($fee->penalty_amount),
                    'created_at' => $fee->created_at, // تاریخ میلادی
                    'description' => $fee->description,
                ];
            });
    }

    // public function collection()
    // {
    //     // بازگرداندن لیست قیمت‌ها با فیلتر بر اساس تاریخ
    //     return WorkerFee::with(['order.service', 'worker'])
    //         ->when($this->start_date, function ($query) {
    //             $query->whereDate('created_at', '>=', $this->start_date);
    //         })
    //         ->when($this->end_date, function ($query) {
    //             $query->whereDate('created_at', '<=', $this->end_date);
    //         })
    //         ->get()
    //         ->map(function ($fee) {
    //             return [
    //                 'order_code' => $fee->order->order_code,
    //                 'service_title' => $fee->order->service->title_fa . ' - ' . $fee->order->service_type,
    //                 'worker_name' => $fee->worker->name,
    //                 'worker_id' => $fee->worker->id,
    //                 'amount' => number_format($fee->amount),
    //                 'penalty_amount' => number_format($fee->penalty_amount),
    //                 'created_at' => $fee->created_at,
    //                 'description' => $fee->description,
    //             ];
    //         });
    // }

    public function headings(): array
    {
        // تعریف سربرگ‌های جدول اکسل
        return [
            'کد سفارش',
            'عنوان خدمت',
            'نام نیروی کار',
            'شناسه نیروی کار',
            'مبلغ قیمت‌گذاری (تومان)',
            'مبلغ جریمه (تومان)',
            'تاریخ ثبت',
            'توضیحات',
        ];
    }
}
