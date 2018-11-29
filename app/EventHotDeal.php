<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class EventHotDeal extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'start_time', 'end_time', 'deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hours', 'discount', 'start_time', 'end_time', 'event_id'
    ];

    /**
     * Get Hot Events
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * Get Hot Deal Orders
     */
    public function orders()
    {
        return $this->HasMany('App\EventHotDeal', 'hot_deal_id');
    }
}
