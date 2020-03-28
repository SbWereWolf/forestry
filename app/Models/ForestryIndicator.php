<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForestryIndicator extends Model
{
    protected $table = 'forestry_indicator';

    protected $fillable = [
        'avrg_bonitet',
        'avrg_class',
        'avrg_increase',
        'avrg_volume',
        'economical_section_high',
        'economical_section_low',
        'operational_fund',
        'operational_volume',
        'wood_specie_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/forestry-indicators/'.$this->getKey());
    }
}
