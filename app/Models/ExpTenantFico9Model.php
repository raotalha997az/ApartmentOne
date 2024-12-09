<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpTenantFico9Model extends Model
{
    use HasFactory;
    protected $table = 'exp_tenant_fico9';

    protected $fillable = [
        'user_id',
        'data',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
