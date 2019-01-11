<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayoutDetail extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $table = 'payout_details';

    protected $fillable = [
        'paykey', 'event_time_locations_id', 'transaction_id', 'amount', 'token', 'status', 'payment_status'
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
     * Get Event Location
     */
    public function event_location()
    {
        return $this->belongsTo('App\EventTimeLocation');
    }

}
