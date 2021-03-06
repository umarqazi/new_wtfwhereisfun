<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'country_id'];

    /**
     * Get the Country that owns the states.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the cities for the state.
     */
    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
