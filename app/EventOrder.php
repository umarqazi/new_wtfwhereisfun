<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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
        'user_id', 'event_id', 'transaction_id', 'payment_gross', 'currency_code', 'payer_email', 'payment_status', 'ticket_id', 'quantity', 'ticket_price', 'paypal_token', 'payment_method', 'is_deal_availed', 'discount', 'hot_deal_id', 'qr_image', 'ticket_pdf'
    ];

    /**
     * The attributes that appended to the model
     *
     * @var array
     */
    protected $appends = ['directory', 'encrypted_id'];

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
     * Get Directory of the model instance
     *
     * @var array
     */
    public function getDirectoryAttribute()
    {
        $directory = getDirectory('orders', $this->id);
        return $directory['web_path'];
    }

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

    public function disputes()
    {
        return $this->hasMany('App\Dispute');
    }

    /**
     * Get Order Discount Details
     */
    public function hot_deal()
    {
        return $this->BelongsTo('App\EventHotDeal', 'hot_deal_id');
    }

    /**
     * Scope a query to get completed orders.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetCompletedOrders($query)
    {
        return $query->whereIn('payment_status', ['Completed', 'succeeded']);
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
        return $query->where('user_id', $userId);
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
        return $query->where('event_id', $eventId);
    }

    /**
     * Scope a query to get ticket orders.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetTicketOrders($query, $ticketId)
    {
        if(gettype($ticketId) == 'array'){
            return $query->whereIn('ticket_id', $ticketId);
        }else{
            return $query->where('ticket_id', $ticketId);
        }
    }

    /**
     * Scope a query to get weekly ticket orders.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetWeeklyTicketOrders($query, $ticketId)
    {
        if(gettype($ticketId) == 'array'){
            $query = $query->whereIn('ticket_id', $ticketId);
        }else{
            $query = $query->where('ticket_id', $ticketId);
        }

        $query->whereDate('created_at', '>=', Carbon::today()->subWeek());
    }

    /**
     * Scope a query to get monthly ticket orders.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetMonthlyTicketOrders($query, $ticketId)
    {
        if(gettype($ticketId) == 'array'){
            $query = $query->whereIn('ticket_id', $ticketId);
        }else{
            $query = $query->where('ticket_id', $ticketId);
        }

        $query->whereDate('created_at', '>=', Carbon::today()->subMonth());
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
