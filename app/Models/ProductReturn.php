<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReturn extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'product_id',
        'quantity',
        'date',
        'user_id',
    ];
    public function company()
    {
        return $this->belongsTo('App\Models\ClientSetting','company_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\ProductInfo','product_id');
    }
}
