<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTimeLocation extends Model
{
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
}
