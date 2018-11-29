<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'phonecode'];

    /**
     * Get the states for the country.
     */
    public function states()
    {
        return $this->hasMany('App\State');
    }
}
