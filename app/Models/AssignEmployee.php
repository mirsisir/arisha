<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
            'employee_id',
            'type',
            'date',
            'user_id',
    ];
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','employee_id');
    }
    public function company()
    {
        return $this->belongsTo('App\Models\ClientSetting','company_id');
    }
}
