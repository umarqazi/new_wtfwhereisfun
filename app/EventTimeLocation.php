<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class EventTimeLocation extends Model
{
    protected $dates = ['created_at', 'updated_at', 'starting', 'ending'];

    protected $with = ['event'];

    protected $fillable = [
        'event_id', 'location', 'address', 'display_currency', 'transacted_currency', 'longitude', 'latitude', 'starting',
        'ending', 'timezone_id'
    ];

    /**
     * The attributes that appended to the model
     *
     * @var array
     */
    protected $appends = ['encrypted_id'];

    /**
     * Get Encrypted Id of the model instance
     *
     */
    public function getEncryptedIdAttribute()
    {
        return encrypt_id($this->id);
    }

    /**
     * Get Event
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * Get EventTimeZone
     */
    public function timezone()
    {
        return $this->belongsTo('App\Timezone');
    }

    /**
     * Get Display Currency
     */
    public function display_currency()
    {
        return $this->belongsTo('App\Currency', 'display_currency_id');
    }

    /**
     * Get Hot Event.
     */
    public function hot_deal(){
        return $this->HasOne('App\EventHotDeal', 'time_location_id');
    }

    /**
     * Get Transacted Currency
     */
    public function transacted_currency()
    {
        return $this->belongsTo('App\Currency', 'transacted_currency_id');
    }

    /**
     * Get Event Domain
     */
    public function domain()
    {
        return $this->HasOne('App\Domain', 'event_location_id');
    }

    /**
     * Get Time and location tickets
     */
    public function tickets()
    {
        return $this->HasMany('App\EventTicket', 'time_location_id');
    }

    /**
     * Get WaitList Setting
     */
    public function wait_list_setting()
    {
        return $this->HasOne('App\WaitingListSetting', 'event_time_location_id');
    }


    /**
     * Scope a query to get Today's Events.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTodayEvents($query)
    {
        return $query->whereDate('starting', '<=',  Carbon::today()->toDateString())->where('ending', '>=', Carbon::today()->toDateString());
    }

    /**
     * @param $query
     * @param null $start
     * @param null $end
     * @return mixed
     */
    public function scopeEventsByDate($query, $start = null, $end = null)
    {
        if (!empty($start) && !empty($end)){
            return $query->where('starting', '>=', $start)->where('ending', '<=',$end);
        } elseif (!empty($start)){
            return $query->where('starting', '>=', $start);
        } elseif (!empty($end)) {
            return $query->where('ending', '<=', $end);
        } else {
            return $query->where('starting', '>=',  Carbon::today()->toDateString())->where('ending', '<=', Carbon::today()->toDateString());
        }
    }

    /**
     * Scope a query to get Future Events.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFutureEvents($query)
    {
        return $query->whereDate('starting', '>=',  Carbon::today()->addDay()->toDateString())->where('ending', '>=', Carbon::today()->addDay());
    }

    /**
     * Scope a query to get Past Events.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePastEvents($query)
    {
        return $query->where('ending', '<', Carbon::today());
    }

    /**
     * Scope a query to Search By Location
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchByLocation($query, $location)
    {
        return $query->where('location', 'like', '%'.$location.'%');
    }

    /**
     * Scope a query to get recent Event Locations by Created At.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecentCreatedAt($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

}
