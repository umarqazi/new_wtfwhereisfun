<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $table = 'guest_list';

    protected $fillable = [
        'guest_list_id', 'ticket_id', 'name', 'quantity', 'guest_affiliation', 'guest_email'
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
    public function guestList()
    {
        return $this->belongsTo('App\GuestList');
    }

    /**
     * Get Ticket
     */
    public function ticket()
    {
        return $this->belongsTo('App\EventTicket');
    }

}
