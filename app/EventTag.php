<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'event_id'
    ];

    /**
     * Get Tag's Event
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
