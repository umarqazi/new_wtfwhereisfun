<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'symbol'];

    /**
     * Get Event Display Currencies
     */
    public function event_display_currency()
    {
        return $this->HasMany('App\EventTimeLocation', 'display_currency_id');
    }

    /**
     * Get Event Transacted Currencies
     */
    public function event_transacted_currency()
    {
        return $this->HasMany('App\EventTimeLocation', 'transacted_currency_id');
    }

}
