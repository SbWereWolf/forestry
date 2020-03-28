<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuttingArea extends Model
{
    protected $table = 'cutting_area';

    protected $fillable = [
        'avrg_increase',
        'cutting_turnover',
        'first_age',
        'ripeness',
        'second_age',
        'substance',
        'wood_specie_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/cutting-areas/'.$this->getKey());
    }
}
