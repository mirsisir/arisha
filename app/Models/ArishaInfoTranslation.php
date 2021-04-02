<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArishaInfoTranslation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function info()
    {
        return $this->belongsTo(ArishaInfo::class);
    }
}
