<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    use HasFactory;

    protected $table = 'otps'; 

    protected $fillable = [
        'phone', 'otp_code', 'is_verified', 'expires_at'
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'expires_at' => 'datetime'
    ];
}
