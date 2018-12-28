<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestList extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $table = 'guest_lists';

    protected $fillable = [
        'event_time_locations_id', 'name'
    ];

    /**
     * The attributes that appended to the model
     *
     * @var array
     */
    protected $appends = ['encrypted_id'];

    /**
     * Get Encrypted Id of the model instance
     *
     */
    public function getEncryptedIdAttribute()
    {
        return encrypt_id($this->id);
    }

    /**
     * Get Event Location
     */
    public function event_location()
    {
        return $this->belongsTo('App\EventTimeLocation');
    }
}
