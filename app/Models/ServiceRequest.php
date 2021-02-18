<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function customer(){
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function employee()
    {
        return $this->belongsTo(user::class,'employes_id','id' );
    }

    public function pickoff()
    {
        return $this->belongsTo( PickoffAddress::class,'pickoff_addresses_id','id');
    }


}
