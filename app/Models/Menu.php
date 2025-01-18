<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];

    public function children()
    {
        // return $this->hasMany(Menu::class, 'parent_id');
        return $this->hasMany(Menu::class, 'parent_id')->with('children');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
}
