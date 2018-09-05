<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTopic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'image'
    ];

    /**
     * Get Events
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }

    /**
     * Get Events
     */
    public function sub_topics()
    {
        return $this->HasMany('App\EventSubTopic');
    }
}
