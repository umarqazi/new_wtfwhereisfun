<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEmailPreference extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'update_new_feature', 'weekly_event_guide', 'additional_info', 'updates_for_attendees', 'buy_ticket', 'organizing_update_new_feature', 'event_sales_recap', 'updates_for_event_organizers', 'updates_for_event_attendees', 'important_reminders', 'order_confirmation'];

    /**
     * Get the user that owns the email preference.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

