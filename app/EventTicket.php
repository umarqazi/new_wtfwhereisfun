<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    protected $fillable = [
        'event_id', 'name', 'quantity', 'price', 'description', 'selling_start', 'selling_end', 'status',
        'min_order', 'max_order', 'release_ticket', 'availability', 'type', 'stripe_sku_id'
    ];

    protected $with = ['time_location'];

    /**
     * The attributes that appended to the model
     */
    protected $appends = ['qty_left'];

    /**
     * Get Quantity Left of the model instance
     */
    public function getQtyLeftAttribute()
    {
        $completedOrders = $this->orders()->getCompletedOrders()->get();
        return $this->quantity - $completedOrders->sum('quantity');
    }

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

    /**
     * Get Ticket Orders
     */
    public function orders()
    {
        return $this->hasMany('App\EventOrder', 'ticket_id');
    }

    /**
     * Get Ticket Time and Location
     */
    public function time_location()
    {
        return $this->belongsTo('App\EventTimeLocation', 'time_location_id');
    }

    /**
     * Get Ticket WaitList
     */
    public function waitings()
    {
        return $this->HasMany('App\WaitList', 'ticket_id');
    }

}
