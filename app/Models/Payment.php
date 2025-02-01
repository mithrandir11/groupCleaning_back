<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;

class Payment extends Model
{
    protected $guarded = [];
    
    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    public function getCreatedAtAttribute($value)
    {
        // return CalendarUtils::strftime('Y/m/d', strtotime($value));
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }

    public function getPaymentDateAttribute($value)
    {
        return CalendarUtils::strftime('Y/m/d', strtotime($value));
    }

}
