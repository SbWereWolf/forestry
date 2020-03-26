<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForestResource extends Model
{
    protected $fillable = [
        'bonitet_id',
        'forest_fund',
        'timber_class_id',
        'wood_specie_id',
        'wood_stock',

    ];


    protected $dates = [

    ];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/forest-resources/' . $this->getKey());
    }

    public function woodSpecie()
    {
        return $this->belongsTo(WoodSpecie::class);
    }

    public function timberClass()
    {
        return $this->belongsTo(TimberClass::class);
    }

    public function bonitet()
    {
        return $this->belongsTo(Bonitet::class);
    }
}
