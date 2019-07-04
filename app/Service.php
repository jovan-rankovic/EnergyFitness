<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function price()
    {
        return $this->belongsTo('App\Price');
    }
}
