<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;


class ArishaInfo extends Model
{


    public $translatedAttributes = ['title', 'details'];

    protected $table = 'arisha_infos';
    protected $primaryKey = 'id';
    protected $fillable = [
                  'name',
              ];

    public function translation($language = "en")
    {
        if ($language == "en") {
            $language = App::getLocale();
            if ($language == null ){
                $language = "en";
            }
        }
        return $this->hasMany('App\Models\ArishaInfoTranslation')->where('locale', '=', $language)->first();
    }



}
