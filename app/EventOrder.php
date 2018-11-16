<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventOrder extends Model
{
    /**
     * Load Order Relations
     *
     * @var array
     */
    protected $with = ['user', 'event', 'ticket'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'event_id', 'transaction_id', 'payment_gross', 'currency_code', 'payer_email', 'payment_status', 'ticket_id', 'quantity', 'ticket_price', 'paypal_token', 'payment_method'
    ];

    /**
     * Get Order Event
     */
    public function event()
    {
        return $this->BelongsTo('App\Event');
    }

    /**
     * Get Order User
     */
    public function user()
    {
        return $this->BelongsTo('App\User');
    }

    /**
     * Get Order Ticket
     */
    public function ticket()
    {
        return $this->BelongsTo('App\EventTicket');
    }


    /**
     * Scope a query to get user tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetUserOrders($query, $userId)
    {
        return $query->whereIn('payment_status', ['Completed', 'succeeded'])->where('user_id', $userId);
    }

    /**
     * Scope a query to get event tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetEventOrders($query, $eventId)
    {
        return $query->whereIn('payment_status', ['Completed', 'succeeded'])->where('event_id', $eventId);
    }

    /**
     * Scope a query to get recent Orders by Created At.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecentCreatedAt($query)
    {
        return $query->orderBy('created_at', 'desc');
    }


}
