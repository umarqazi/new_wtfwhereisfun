<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reset_passwords';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'token'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
