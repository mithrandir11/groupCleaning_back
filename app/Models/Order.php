<?php

namespace App\Models;

use App\Observers\OrderObserver;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;

#[ObservedBy([OrderObserver::class])]
class Order extends Model
{
    protected $guarded = [];
    protected $casts = [
        'service_options' => 'array',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $persianDate = CalendarUtils::strftime('Ym', strtotime(now()));
            $uniqueNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
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

    public function workers()
    {
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
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }


    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($query) use ($search) {
            $query->where('order_code', 'like', "%{$search}%");
        });
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public static function getPendingCount()
    {
        return Order::pending()->count();
    }


}
