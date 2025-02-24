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

    public function totalPenaltyAmountForWorker($workerId)
    {
        return WorkerFee::where('worker_id', $workerId)->sum('penalty_amount');
    }

    public function totalCreditAmountForWorker($workerId)
    {
        $total_paid_amount = $this->totalPaidAmountForWorker($workerId);
        $total_income_amount = $this->totalIncomeAmountForWorker($workerId);
        $total_penalty_amount = $this->totalPenaltyAmountForWorker($workerId);
        return $total_income_amount - $total_paid_amount - $total_penalty_amount;
    }

    public function balanceStatus($workerId){
        $total_credit_amount = $this->totalCreditAmountForWorker($workerId);
        if($total_credit_amount > 0){
            return 'creditor';
        }elseif($total_credit_amount < 0){
            return 'debtor';
        }else{
            return 'balanced';
        }
    }

    
}
