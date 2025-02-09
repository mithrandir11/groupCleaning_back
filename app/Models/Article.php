<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seo()
    {
        return $this->morphOne(SeoData::class, 'seotable');
    }

    public function getCreatedAtAttribute($value)
    {
        // return CalendarUtils::strftime('Y/m/d', strtotime($value));
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    
}
