<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WoodSpecie extends Model
{
    protected $table = 'wood_specie';

    protected $fillable = [
        'calculation_period',
        'main_harvesting_age',
        'timber_harvesting_age',
        'title',

    ];


    protected $dates = [

    ];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/wood-species/'.$this->getKey());
    }

    public function forestResources()
    {
        return $this->hasMany(ForestResource::class);
    }
}
