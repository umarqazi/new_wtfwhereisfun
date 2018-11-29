<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketPass extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ticket_id'
    ];

    /**
     * Get Passes Ticket
     */
    public function ticket()
    {
        return $this->belongsTo('App\EventTicket', 'ticket_id');
    }
}
