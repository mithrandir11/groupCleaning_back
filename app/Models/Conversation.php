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

    // public function user2()
    // {
    //     return $this->belongsTo(User::class, 'user2_id');
    // }

    // // پیدا کردن مکالمه بین دو کاربر
    // public static function betweenUsers($user1, $user2)
    // {
    //     return self::where(function($q) use ($user1, $user2) {
    //         $q->where('user1_id', $user1)
    //           ->where('user2_id', $user2);
    //     })->orWhere(function($q) use ($user1, $user2) {
    //         $q->where('user1_id', $user2)
    //           ->where('user2_id', $user1);
    //     })->first();
    // }

    // public function otherUser(User $user)
    // {
    //     return $this->user1_id === $user->id ? $this->user2 : $this->user1;
    // }
}
