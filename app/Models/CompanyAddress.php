<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    use HasFactory;

    protected $table = 'companies_address';
    
    protected $fillable = [
        'street',
        'district',
        'city',
        'state',
        'cep',
        'company_id',
    ];
}
