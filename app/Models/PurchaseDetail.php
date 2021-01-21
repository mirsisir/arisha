<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'primary_id',
        'product_id',
        'quantity',
        'price',
        'total',
        'user_id',
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\ProductInfo','product_id');
    }
}
