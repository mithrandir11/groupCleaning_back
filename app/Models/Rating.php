<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = [];
   
    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

   
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
