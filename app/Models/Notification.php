<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;

class Notification extends Model
{
    protected $guarded = [];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    // دسترسی کاربران
    public function users(){
        return $this->role->users();
    }

    public function getCreatedAtAttribute($value)
    {
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }
}
