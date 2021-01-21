<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'supplier_memo',
        'product_id',
        'quantity',
        'price',
        'total',
        'date',
        'user_id',
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\ProductInfo','product_id');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier','supplier_id');
    }
}
