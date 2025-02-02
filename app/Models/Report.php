<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;

class Report extends Model
{
    protected $guarded = [];
    
    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    // public function getReportDateAttribute($value)
    // {
    //     return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    // }

    public function getUpdatedAtAttribute($value)
    {
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }

    public function totalPaidAmountForWorker($workerId)
    {
        return Payment::where('worker_id', $workerId)->sum('amount');
    }

    public function totalIncomeAmountForWorker($workerId)
    {
        return WorkerFee::where('worker_id', $workerId)->sum('amount');
    }

    public function totalCreditAmountForWorker($workerId)
    {
        $total_paid_amount = $this->totalPaidAmountForWorker($workerId);
        $total_income_amount = $this->totalIncomeAmountForWorker($workerId);
        return $total_income_amount - $total_paid_amount;
    }

    // public function getStatusAttribute($value)
    // {
    //     return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    // }
    
}
