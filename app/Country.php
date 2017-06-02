<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'countries';

    public function organization() {
        $this->belongsTo('App\Organization');
    }

    public function calendar() {
        $this->hasMany('App\Calendar');
    }

}
