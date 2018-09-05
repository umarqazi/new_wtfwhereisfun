<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'abbr', 'offset', 'isdst', 'text', 'utc'];

    /**
     * Get Events
     */
    public function time_location()
    {
        return $this->HasMany('App\EventTimeLocation');
    }
}
