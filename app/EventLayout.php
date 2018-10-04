<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventLayout extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'path', 'image'
    ];

    /**
     * Get Layout Events
     */
    public function events()
    {
        return $this->HasMany('App\Events');
    }
}
