<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'whatsapp',
        'payment_methods',
        'minimum_order',
        'delivery_fee',
        'status',
        'opening_hours',
        'closing_hours',
        'branch_id',
    ];

    public function address()
    {
        return $this->hasOne(CompanyAddress::class, 'company_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'company_id');
    }
}
