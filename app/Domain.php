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
        'type', 'domain', 'url', 'event_id', 'organizer_id'
    ];

}
