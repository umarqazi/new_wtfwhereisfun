<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    protected $fillable = [
        'event_id', 'name', 'quantity', 'price', 'description', 'selling_start', 'selling_end', 'status',
        'min_order', 'max_order', 'release_ticket', 'availability', 'type'
    ];

    /**
     * Get Event
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * Get Ticket Passes
     */
    public function passes()
    {
        return $this->hasMany('App\TicketPass', 'ticket_id');
    }

}
