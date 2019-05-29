<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    protected $appends = ['qty_left', 'encrypted_id'];

    /**
     * Get Quantity Left of the model instance
     */
    public function getQtyLeftAttribute()
    {
        $completedOrders = $this->orders()->getCompletedOrders()->get();
        return $this->quantity - $completedOrders->sum('quantity');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeMaxiumumTicketSold($query){
        $max = $query->groupBy('time_location_id')->orderBy(\DB::raw('count(time_location_id)'), 'DESC');
        return $max;
    }

    /**
     * Get Encrypted Id of the model instance
     *
     * @var array
     */
    public function getEncryptedIdAttribute()
    {
        return encrypt_id($this->id);
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
