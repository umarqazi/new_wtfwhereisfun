<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaitingListSetting extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $with = ['event'];

    protected $table = 'wait_list_settings';

    protected $fillable = [
        'event_id', 'event_time_locations_id', 'triggers_on', 'max_count', 'collect_name', 'collect_email', 'collect_phn', 'time_to_respond_days', 'time_to_respond_hours', 'time_to_respond_mins', 'auto_respond_msgs', 'ticket_release_msgs'
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
     * Get Event
     */
    public function event_location()
    {
        return $this->belongsTo('App\EventTimeLocation');
    }

}
