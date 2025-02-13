<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
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
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($query) use ($search) {
            // جستجو بر اساس کد سفارش مرتبط
            $query->whereHas('order', function($q) use ($search) {
                $q->where('order_code', 'like', "%{$search}%");
            });
        });
    }
}
