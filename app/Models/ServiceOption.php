<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOption extends Model
{
    public function values()
    {
        return $this->hasMany(ServiceOptionValue::class, 'option_id');
    }
}
