<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{

    protected $fillable = ['date', 'country_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
