<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function countries()
    {
        return $this->hasMany('App\Country');
    }

}
