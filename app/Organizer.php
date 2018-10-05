<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $fillable = [
        'name', 'descprition', 'website', 'organizer_url', 'image', 'thumbnail', 'facebook',
        'twitter', 'instagram', 'google', 'timbler', 'linkedin', 'backgroud_color', 'text_color', 'is_allowed_on_event_page',
        'user_id'
    ];

    /**
     * Get Organizer Vendor.
     */
    public function vendor()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get organizer events.
     */
    public function events()
    {
        return $this->HasMany('App\Event');
    }
}