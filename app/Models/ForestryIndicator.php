<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForestryIndicator extends Model
{
    protected $table = 'forestry_indicator';

    protected $dates = [

    ];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/forestry-indicators/'.$this->getKey());
    }

    public function woodSpecie()
    {
        return $this->belongsTo(WoodSpecie::class);
    }
}
