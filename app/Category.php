<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'image', 'thumbnail'];

    public function events(){
        return $this->hasMany('App\Event');
    }
}
