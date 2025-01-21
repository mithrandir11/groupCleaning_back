<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;

class Order extends Model
{
    protected $guarded = [];
    protected $casts = [
        'service_options' => 'array', // تبدیل JSON به آرایه
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $persianDate = CalendarUtils::strftime('Ymd', strtotime(now()));
            $uniqueNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $order->order_code = "{$persianDate}-{$uniqueNumber}";
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function setSelectedDateAttribute($value)
    {
        $convertedDate = convertPersianToEnglishNumbers($value);
        $this->attributes['selected_date'] = CalendarUtils::createCarbonFromFormat('Y/m/d', $convertedDate)->format('Y-m-d');
    }

 
    public function getSelectedDateAttribute($value)
    {
        return CalendarUtils::strftime('Y/m/d', strtotime($value));
    }

    public function getStatusAttribute($status)
    {
        switch ($status) {
            case 'pending':
                $status = 'در انتظار بررسی';
                break;
            case 'completed':
                $status = 'اتمام';
                break;
            case 'processing':
                $status = 'در حال انجام کار';
                break;
            case 'cancelled':
                $status = 'انصراف';
                break;
        }
        return $status;
    }



}
