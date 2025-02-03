<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
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
            // $persianDate = CalendarUtils::strftime('Ymd', strtotime(now()));
            $persianDate = CalendarUtils::strftime('Ym', strtotime(now()));
            $uniqueNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            // $order->order_code = "{$persianDate}-{$uniqueNumber}";
            $order->order_code = "{$persianDate}{$uniqueNumber}";
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // public function workers()
    // {
    //     return $this->hasMany(User::class, 'worker_id');
    // }

    public function workers()
    {
        // return $this->belongsToMany(User::class, 'worker_orders', 'order_id', 'worker_id');
        return $this->belongsToMany(User::class, 'worker_orders', 'order_id', 'worker_id')
        ->withPivot(['status']);
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

    public function getDeliveryDateAttribute($value)
    {
        // return CalendarUtils::strftime('Y/m/d', strtotime($value));
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        // return CalendarUtils::strftime('Y/m/d', strtotime($value));
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }

    // public function getStatusAttribute($status)
    // {
    //     switch ($status) {
    //         case 'pending':
    //             $status = 'در انتظار بررسی';
    //             break;
    //         case 'completed':
    //             $status = 'اتمام';
    //             break;
    //         case 'processing':
    //             $status = 'در حال انجام کار';
    //             break;
    //         case 'cancelled':
    //             $status = 'انصراف';
    //             break;
    //     }
    //     return $status;
    // }


    // public function getCommissionAmountAttribute()
    // {
    //     return $this->total_amount * ($this->worker->resume->commission_rate / 100);
    // }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($query) use ($search) {
            $query->where('order_code', 'like', "%{$search}%");
                //   ->orWhere('family', 'like', "%{$search}%")
                //   ->orWhere('cellphone', 'like', "%{$search}%");
        });
    }


}
