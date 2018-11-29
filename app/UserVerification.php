<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'token'];

    /**
     * Get the user that owns the verification.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
