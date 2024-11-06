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
        'address'
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
}
