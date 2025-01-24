<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkerOrder extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
}
