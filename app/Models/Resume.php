<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Resume extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'resume_skill');
    }

    public function getCreatedAtAttribute($value)
    {
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }

    // public function getStatusAttribute($status)
    // {
    //     switch ($status) {
    //         case 'pending':
    //             $status = 'در انتظار بررسی';
    //             break;
    //         case 'approved':
    //             $status = 'تایید شده';
    //             break;
    //         case 'rejected':
    //             $status = 'رد شده';
    //             break;
    //         default:
    //             return $status;
    //     }
    //     return $status;
    // }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($query) use ($search) {
            $query->where('national_code',$search);
        });
    }
}
