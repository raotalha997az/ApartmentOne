<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Screening;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'country',
        'state',
        'postal_code',
        'address',
        'house_number',
        'profile_img',   // Profile image
        'date_of_birth', // Date of birth
        'password',
        'verification_token',
        'payment_status',
        'payment_expires_at',
    ];

    public function getAgeAttribute()
    {
        if (!$this->date_of_birth) {
            return null; // Return null if date_of_birth is not set
        }

        return Carbon::parse($this->date_of_birth)->age; // Calculate age using Carbon
    }

    protected $appends = ['age'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
            'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function bank(){
        return $this->hasOne(Bank::class);
    }
    public function screening(){
        return $this->hasMany(Screening::class);
    }
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function sentMessages()
{
    return $this->hasMany(Message::class, 'sender_id');
}

public function receivedMessages()
{
    return $this->hasMany(Message::class, 'receiver_id');
}

public function payments()
{
    return $this->hasMany(Payment::class);
}

public function applyPropertyHistory()
{
    return $this->hasMany(ApplyPropertyHistory::class, 'user_id');
}



}
