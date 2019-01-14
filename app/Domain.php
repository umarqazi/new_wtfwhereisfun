<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Domain
 * @package App
 */
class Domain extends Model
{
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @var string
     */
    protected $table = 'domains';

    /**
     * @var array
     */
    protected $fillable = [
        'type', 'domain', 'url', 'event_location_id', 'organizer_id'
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
     * Get Time Location Domain
     */
    public function time_location()
    {
        return $this->belongsTo('App\EventTimeLocation', 'event_location_id');
    }

    /**
     * Get Organizer Domain
     */
    public function organizer()
    {
        return $this->belongsTo('App\Organizer', 'organizer_id');
    }

}
