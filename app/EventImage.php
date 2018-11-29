<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
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
     * Get Image Event
     */
    public function event()
    {
        return $this->belongsTo('App\Events');
    }
}
