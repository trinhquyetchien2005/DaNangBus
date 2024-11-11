<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customers extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Đặt bảng tương ứng với model
    protected $table = 'customers';

    // Cấu hình các thuộc tính có thể lưu trữ hàng loạt
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'is_active',
        'avatar',
    ];

    // Ẩn các thuộc tính khi trả về JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Chuyển đổi kiểu dữ liệu
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];
}
