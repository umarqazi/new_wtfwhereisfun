<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'contact', 'referral_code', 'discount', 'access', 'slug',
        'additional_message', 'total_capacity', 'refund_policy', 'is_draft', 'is_online', 'ticket_flag', 'is_sold_out', 'is_shareable',
        'is_published', 'is_cancelled', 'is_approved', 'status', 'user_id', 'event_type_id', 'event_topic_id',
        'event_sub_topic_id', 'category_id', 'template_id'
    ];

    /**
     * Get EvenTopic.
     */
    public function topic()
    {
        return $this->belongsTo('App\EventTopic', 'event_topic_id');
    }

    /**
     * Get EventSubTopic.
     */
    public function sub_topic()
    {
        return $this->belongsTo('App\EventSubTopic', 'event_sub_topic_id');
    }

    /**
     * Get EventTimeLocations
     */
    public function time_locations()
    {
        return $this->hasMany('App\EventTimeLocation');
    }

    /**
     * Get EventTickets
     */
    public function tickets()
    {
        return $this->hasMany('App\EventTicket');
    }

    /**
     * Get EventSubTopic.
     */
    public function type()
    {
        return $this->belongsTo('App\EventType', 'event_type_id');
    }

    public function refund_policy(){
        return $this->belongsTo('App\RefundPolicy');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }


}
