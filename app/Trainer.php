<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $guarded = [];

    public function socials()
    {
        return $this->hasMany('App\Social');
    }
}
