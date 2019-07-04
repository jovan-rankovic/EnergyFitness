<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded = [];

    public function services()
    {
        return $this->hasMany('App\Service');
    }
}
