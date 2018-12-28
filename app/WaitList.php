<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaitList extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $table = 'wait_list';

    protected $fillable = [
        'event_id', 'event_time_location_id', 'ticket_id', 'name', 'email', 'phn'
    ];

    /**
     * The attributes that appended to the model
     *
     * @var array
     */
    protected $appends = ['encrypted_id'];

    /**
     * Get Encrypted Id of the model instance
     * @return string
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
     * Get Event Location
     */
    public function event_location()
    {
        return $this->belongsTo('App\EventTimeLocation');
    }

    /**
     * Get Ticket
     */
    public function ticket()
    {
        return $this->belongsTo('App\EventTicket', 'ticket_id');
    }

}
