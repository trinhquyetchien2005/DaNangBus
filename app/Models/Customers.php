<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * Tên bảng trong cơ sở dữ liệu.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * Các thuộc tính có thể gán giá trị hàng loạt.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'date_of_birth', // Thêm trường ngày sinh
        'gender',         // Thêm trường giới tính
        'email',
        'password',
        'phone_number',
        'is_active',
        'avatar',
    ];

    /**
     * Các thuộc tính bị ẩn khi trả về JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Chuyển đổi kiểu dữ liệu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Thêm trường xác minh email
        'date_of_birth' => 'date',         // Chuyển đổi thành kiểu ngày
        'is_active' => 'boolean',
    ];

    /**
     * Quan hệ với model Ticket.
     * Một khách hàng có thể có nhiều vé.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticket()
{
    return $this->hasOne(Ticket::class, 'customer_id');
}


    /**
     * Kiểm tra khách hàng có vé hay không.
     *
     * @return bool
     */
    public function hasTicket()
{
    return $this->ticket()->exists();
}
}
