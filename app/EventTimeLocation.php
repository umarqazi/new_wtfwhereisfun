<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTimeLocation extends Model
{
    protected $dates = ['created_at', 'updated_at', 'starting', 'ending'];

    protected $fillable = [
        'event_id', 'location', 'address', 'display_currency', 'transacted_currency', 'longitude', 'latitude', 'starting',
        'ending', 'timezone_id'
    ];

    /**
     * Get Event
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * Get EventTimeZone
     */
    public function timezone()
    {
        return $this->belongsTo('App\Timezone');
    }

    /**
     * Get Display Currency
     */
    public function display_currency()
    {
        return $this->belongsTo('App\Currency', 'display_currency_id');
    }

    /**
     * Get Transacted Currency
     */
    public function transacted_currency()
    {
        return $this->belongsTo('App\Currency', 'transacted_currency_id');
    }
}
