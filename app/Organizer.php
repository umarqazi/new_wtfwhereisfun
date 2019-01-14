<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'name', 'descprition', 'website', 'organizer_url', 'image', 'thumbnail', 'facebook',
        'twitter', 'instagram', 'google', 'timbler', 'linkedin', 'backgroud_color', 'text_color', 'is_allowed_on_event_page',
        'user_id'
    ];

    /**
     * The attributes that appended to the model
     *
     * @var array
     */
    protected $appends = ['directory', 'encrypted_id'];

    /**
     * Get Encrypted Id of the model instance
     *
     * @var array
     */
    public function getEncryptedIdAttribute()
    {
        return encrypt_id($this->id);
    }

    /**
     * Get Directory of the model instance
     *
     * @var array
     */
    public function getDirectoryAttribute()
    {
        $directory = getDirectory('organizers', $this->id);
        return $directory['web_path'];
    }


    /**
     * Get Organizer Vendor.
     */
    public function vendor()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get organizer events.
     */
    public function events()
    {
        return $this->HasMany('App\Event');
    }

    /**
     * Get Organizer Domain
     */
    public function domain()
    {
        return $this->HasOne('App\Domain', 'organizer_id');
    }
}
