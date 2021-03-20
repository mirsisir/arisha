<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sisir extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sisirs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'charge',
                  'category_id',
                  'employee_charge',
                  'hourly',
                  'basic_price',
                  'km_price',
                  'stop_over_price',
                  'waiting_price',
                  'helpers',
                  'details',
                  'SPM'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the category for this model.
     *
     * @return App\Models\Category
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }



}
