<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($menu) {
            $menu->full_path = self::generateFullPath($menu);
        });
    }

    // تابع برای ایجاد مسیر کامل
    protected static function generateFullPath($menu)
    {
        $path = $menu->slug;

        if ($menu->parent) {
            $path = self::generateFullPath($menu->parent) . '/' . $path;
        }

        return $path;
    }
    

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
        // return $this->hasMany(Menu::class, 'parent_id')->with('children');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }


    


    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    // رابطه با صفحات پیشنهادی
    public function suggestedPages()
    {
        return $this->hasMany(SuggestedPage::class);
    }

    public function seo()
    {
        return $this->morphOne(SeoData::class, 'seotable');
    }
}
