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
     * Get the Country that owns the states.
     */
    public function vendor()
    {
        return $this->belongsTo('App\User');
    }
}
