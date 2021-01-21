<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniformSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'stock'
    ];
}
