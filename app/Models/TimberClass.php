<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimberClass extends Model
{
    protected $table = 'timber_class';

    protected $dates = [

    ];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/timber-classes/'.$this->getKey());
    }
}
