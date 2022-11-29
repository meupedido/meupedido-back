<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'whatsapp',
        'payment_methods',
        'status',
        'opening_hours',
        'closing_hours',
    ];

    public function address()
    {
        return $this->hasOne(CompanyAddress::class, 'company_id');
    }
}
