<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function sources()
    {
        return $this->belongsToMany('App\Source');
    }
}
