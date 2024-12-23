<?php

namespace App\Models;

use App\Models\TenantPet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Screening extends Model
{
    use HasFactory;

    protected $table = 'screenings';

    protected $fillable = [
        'user_id',
        'property_city',
        'property_location',
        'shifting_date',
        'rent_type',
        'cat_id',
        'pet',
        'smoke',
        'waterbed',
        'lease_short_term',
        'security_deposit',
        'deposit_amount',
    ];

    public function pets()
    {
        return $this->hasMany(TenantPet::class);
    }
}
