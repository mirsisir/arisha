<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'brand_id',
        'group',
        'stock',
        'unit',
        'user_id',
    ];
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
}
