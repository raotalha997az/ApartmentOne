<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'property_id',
    ];
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }

}
