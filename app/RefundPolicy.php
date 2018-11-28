<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefundPolicy extends Model
{
    protected $fillable = ['text'];

    public function events(){
        return $this->hasMany('App\Event');
    }
}
