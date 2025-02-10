<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->hasOne(ServiceType::class);
    }


    public function options()
    {
        return $this->hasMany(ServiceOption::class);
    }
}
