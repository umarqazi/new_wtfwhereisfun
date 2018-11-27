<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    protected $fillable = ['user_id', 'event_id', 'event_order_id', 'subject', 'message', 'is_closed', 'closed_at'];
    protected $with = ['dispute_replies','user'];


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

}
