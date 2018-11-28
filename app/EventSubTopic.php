<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSubTopic extends Model
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
     * Get Parent Topic
     */
    public function parent_topic()
    {
        return $this->BelongsTo('App\EventTopic');
    }

    /**
     * Get Events
     */
    public function events()
    {
        return $this->HasMany('App\Event');
    }
}
