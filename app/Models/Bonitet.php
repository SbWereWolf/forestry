<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bonitet extends Model
{
    protected $table = 'bonitet';

    protected $dates = [

    ];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/bonitets/'.$this->getKey());
    }
}
