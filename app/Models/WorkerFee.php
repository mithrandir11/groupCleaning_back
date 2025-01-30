<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;

class WorkerFee extends Model
{
    protected $guarded = [];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    public function getCreatedAtAttribute($value)
    {
        // return CalendarUtils::strftime('Y/m/d', strtotime($value));
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }
}
