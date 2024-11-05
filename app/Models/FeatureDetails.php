<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'feature_id',
        'property_id',
        'quantity',
    ];

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
