<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePrimary extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'supplier_memo',
        'discount',
        'amount',
        'total',
        'payment',
        'date',
        'user_id',
    ];
    public function images()
    {
        return $this->hasMany(PurchaseDetail::modelClass(), 'primary_id');
    }
}
