<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getNameAttribute($name)
    {
        switch ($name) {
            case 'admin':
                return 'ادمین';
            case 'operator':
                return 'اپراتور';
            case 'customer':
                return 'مشتری';
            default:
                return $name;
        }
        return $status;
    }
}
