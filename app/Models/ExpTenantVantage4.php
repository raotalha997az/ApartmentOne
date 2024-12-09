<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpTenantVantage4 extends Model
{
    use HasFactory;

    protected $table = 'exp_tenant_vantage4';

    protected $fillable = [
        'user_id',
        'data',
    ];

    /**
     * Define the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
