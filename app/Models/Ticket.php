<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $dates = ['end_date'];

    protected $fillable = [
        'customer_id',
        'type',
        'end_date',
        'expiry',
        'route',
        'qr_code',
        'active',
        'price',        
        'payment_method',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
