<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    protected $fillable = ['user_id', 'event_id', 'event_order_id', 'subject', 'message', 'is_closed', 'closed_at'];

    protected $with = ['dispute_replies','user'];

    /**
     * The attributes that appended to the model
     *
     * @var array
     */
    protected $appends = ['encrypted_id'];

    /**
     * Get Encrypted Id of the model instance
     *
     * @var array
     */
    public function getEncryptedIdAttribute()
    {
        return encrypt_id($this->id);
    }

    public function dispute_replies()
    {
        return $this->hasMany('App\DisputeReply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function eventOrder()
    {
        return $this->belongsTo('App\EventOrder');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * Scope a query to get recent Disputes by Created At.
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
