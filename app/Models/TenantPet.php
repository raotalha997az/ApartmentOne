<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantPet extends Model
{
    use HasFactory;

    protected $table = 'tenant_pets';

    protected $fillable = ['screening_id', 'pet_id'];
}
