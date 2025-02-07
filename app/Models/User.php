<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Observers\UserObserver;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Morilog\Jalali\CalendarUtils;

#[ObservedBy([UserObserver::class])]
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    public $assignCustomerRole = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'family',
        'status',
        'email',
        'password',
        'cellphone',
        'otp',
        'login_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function notifications(){
    //     return Notification::whereHas('role', function($query) {
    //         $query->where('name', $this->role->name);
    //     })->latest()->get();
    // }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function resume()
    {
        return $this->hasOne(Resume::class);
    }

    public function fees()
    {
        return $this->hasMany(WorkerFee::class, 'worker_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'worker_id');
    }

    // بررسی اینکه کاربر دارای نقش خاصی است
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    // public function orders()
    // {
    //     return $this->belongsToMany(Order::class, 'worker_orders', 'worker_id', 'order_id');
    // }

    public function workerOrders(){
        return $this->hasMany(WorkerOrder::class, 'worker_id');
    }

    // public function acceptedOrders(){
    //     return $this->workerOrders()
    //         ->where('status', 'accepted');
    // }

    public function getAcceptedOrdersCountAttribute(){
        return $this->workerOrders()
            ->where('status', 'accepted')
            ->count();
    }

    public function getCompletedOrdersCountAttribute(){
        return $this->workerOrders()
            ->where('status', 'completed')
            ->count();
    }


    public function givenRatings(){
        return $this->hasMany(Rating::class, 'worker_id');
    }

    public function getAverageRatingAttribute($query){
        return $this->givenRatings()
        ->pluck('rating')
        ->avg();
    }


    // public function getStatusAttribute($status)
    // {
    //     switch ($status) {
    //         case 'active':
    //             $status = 'فعال';
    //             break;
    //         case 'inactive':
    //             $status = 'غیرفعال';
    //             break;
    //         default:
    //             return $status;
    //     }
    //     return $status;
    // }

    public function getCreatedAtAttribute($value)
    {
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }


    public function CommissionAmount($total_amount)
    {
        return $total_amount * ($this->resume->commission_rate / 100);
    }

    

    // public function scopeSearch(Builder $query, string $search): Builder
    // {
    //     return $query->where(function ($query) use ($search) {
    //         $query->where('name', 'like', "%{$search}%")
    //               ->orWhere('family', 'like', "%{$search}%")
    //               ->orWhere('cellphone', 'like', "%{$search}%");
    //     });
    // }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($query) use ($search) {
            // اگر مقدار جستجو عددی است و با "0" شروع نمی‌شود، شرط id را اضافه می‌کنیم
            if (substr($search, 0, 1) == '0') {
                $query->where('cellphone', 'like', "%{$search}%");
                // $query->orWhere('id', (int)$search);
            }else{
                $query
                ->where('id',$search)
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('family', 'like', "%{$search}%");
                
            }
            
            // همیشه روی نام، نام خانوادگی و شماره تماس جستجو شود
            
        });
    }





    
}
