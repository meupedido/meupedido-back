<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineOfBusiness extends Model
{
    use HasFactory;

    protected $table = 'line_of_business';

    protected $fillable = [
        'name',
    ];
}
