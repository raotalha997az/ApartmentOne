<?php

namespace App\Models;

use App\Models\RentToWho;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentToWhoDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_to_who_id',
        'property_id',
    ];


    public function rentToWho()
    {
        return $this->belongsTo(RentToWho::class);
    }
}
