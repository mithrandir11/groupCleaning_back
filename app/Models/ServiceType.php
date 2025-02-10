<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $guarded = [];
    public function values()
    {
        return $this->hasMany(ServiceTypeValue::class, 'type_id');
    }
}
