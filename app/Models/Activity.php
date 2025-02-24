<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;

class Activity extends Model
{
    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }
}
