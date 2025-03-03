<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $guarded = [];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getUnreadMessagesCountAttribute()
    {
        return $this->messages()->whereNull('read_at')->count();
    }

}
