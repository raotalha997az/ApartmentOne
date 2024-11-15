<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplyPropertyHistory extends Model
{
    use HasFactory ,SoftDeletes;

    protected  $table = 'applypropertyhistory';
   protected $fillable = [
        'property_id',
        'user_id',
    ];

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
