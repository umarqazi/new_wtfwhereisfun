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
        'event_sub_topic_id', 'category_id', 'template_id', 'organizer_id'
    ];

    /**
     * Get Events Vendor
     */
    public function vendor()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

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

    /**
     * Get Refund Policy of an Event.
     */
    public function refund_policy(){
        return $this->belongsTo('App\RefundPolicy');
    }

    /**
     * Get Event Category.
     */
    public function category(){
        return $this->belongsTo('App\Category');
    }

    /**
     * Get Event Layout.
     */
    public function layout(){
        return $this->belongsTo('App\EventLayout', 'event_layout_id');
    }

    /**
     * Get Event Images.
     */
    public function images(){
        return $this->HasMany('App\EventImage');
    }

    /**
     * Get Event Organizer.
     */
    public function organizer(){
        return $this->belongsTo('App\Organizer');
    }

    /**
     * Get Event Tags.
     */
    public function tags(){
        return $this->HasMany('App\EventTag');
    }

    /**
     * Get Hot Event.
     */
    public function hot_deal(){
        return $this->HasOne('App\EventHotDeal');
    }

    /**
     * Get Event Orders.
     */
    public function orders(){
        return $this->HasMany('App\EventOrder');
    }


}
