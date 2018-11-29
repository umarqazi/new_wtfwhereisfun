<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisputeReply extends Model
{
    protected $fillable = ['dispute_id', 'message', 'user_id'];

    public function dispute()
    {
        return $this->belongsTo('App\Dispute');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
