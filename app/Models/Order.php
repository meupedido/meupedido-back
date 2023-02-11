<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_tag',
        'demanded',
        'quantity',
        'payment',
        'value',
        'delivery_method',
        'client_name',
        'client_phone',
        'address',
        'comments',
        'status',
        'company_id',
    ];
}
