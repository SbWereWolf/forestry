<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuttingArea extends Model
{
    protected $table = 'cutting_area';

    protected $dates = [

    ];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/cutting-areas/'.$this->getKey());
    }

    public function woodSpecie()
    {
        return $this->belongsTo(WoodSpecie::class);
    }
}
