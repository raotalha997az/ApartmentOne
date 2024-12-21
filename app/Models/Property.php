<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory, SoftDeletes ;
    protected $fillable = [
        'user_id',
        'name',
        'cat_id',
        'credit_point',
        'rent',
        'other_details',
        'available_status',
        'approve',
        'price_rent',
        'eviction',
        'criminal_records',
        'address',
        'country',
        'smoking',
        'credit_history_check',
        'bankruptcy',
        'many_time_evicted',
        'when_evicted',
        'contact_name',
        'contact_phone_number',
        'contact_email',
        'parking',
        'credit_check',
        'kind_of_parking',
        'no_of_vehicle',
        'waterbed',
        'availability_check',
        'date_availability',
        'lease_check',
        'lease_type',
        'lease_period',
        'rent_type',
        'payment_frequency',
        'security_deposit',
        'deposit_amount',
        'conviction',
        'conviction_pecify',
        'choice_voucher',

    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

      public function media(){
       return $this->hasMany(Media::class);
    } 

    public function pets(){
        return $this->hasMany(PetDetails::class, 'property_id');
    }

    public function features()
    {
        return $this->hasMany(FeatureDetails::class, 'property_id');
    }

    public function RentToWhoDetails(){
        return $this->hasMany(RentToWhoDetails::class, 'property_id');
    }

    public function applyPropertyHistories()
    {
        return $this->hasMany(ApplyPropertyHistory::class, 'property_id');
    }
    public function applications()
    {
        return $this->hasMany(ApplyPropertyHistory::class);
    }


}
