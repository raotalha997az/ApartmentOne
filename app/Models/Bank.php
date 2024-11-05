<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank_name',
        'branch_code',
        'identity_card',
        'account_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
