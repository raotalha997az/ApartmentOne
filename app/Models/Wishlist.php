<?php

namespace App\Models;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id', 'property_id'];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }
}
