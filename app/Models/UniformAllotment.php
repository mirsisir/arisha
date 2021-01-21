<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniformAllotment extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'product_id',
        'quantity',
        'date',
        'user_id',
    ];
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','employee_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\UniformSettings','product_id');
    }
}
