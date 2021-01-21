<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
            'website',
            'phone_no',
            'email',
            'address',
            'contact_person',
            'contact_mobile',
            'bill_amount',
            'vat_amount',
    ];
}
