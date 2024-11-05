<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
        'profile_img',   // Profile image
        'date_of_birth', // Date of birth
        'password',
        'role',
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
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
