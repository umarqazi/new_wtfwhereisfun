<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package App
 *
 * @property State state
 */
class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'state_id'];

    /**
     * Get the Country that owns the states.
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function shipping()
    {
        return $this->HasMany('App\ShippingAddress');
    }

    public function billing()
    {
        return $this->HasMany('App\BillingAddress');
    }

}
