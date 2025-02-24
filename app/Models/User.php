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
        'otp_expires_at',
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

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    public function hasAnyRole($roles): bool
    {
        if (is_string($roles)) {
            $roles = [$roles]; 
        }

        return $this->roles()->whereIn('name', $roles)->exists();
    }

    public function workerOrders(){
        return $this->hasMany(WorkerOrder::class, 'worker_id');
    }

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

    public function getCreatedAtAttribute($value)
    {
        return CalendarUtils::strftime('Y/m/d - H:i:s', strtotime($value));
    }


    public function CommissionAmount($total_amount)
    {
        return $total_amount * ($this->resume->commission_rate / 100);
    }


    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($query) use ($search) {
            if (substr($search, 0, 1) == '0') {
                $query->where('cellphone', 'like', "%{$search}%");
            }else{
                $query
                ->where('id',$search)
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('family', 'like', "%{$search}%");
                
            }
            
        });
    }

    
}
