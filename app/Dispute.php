<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    protected $fillable = ['user_id', 'event_id', 'subject', 'message', 'is_closed', 'closed_at'];

    public function dispute_replies()
    {
        return $this->hasMany('App\DisputeReply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
