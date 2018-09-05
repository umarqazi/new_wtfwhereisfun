<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/4/18
 * Time: 9:08 PM
 */

namespace App\Services\Events;

use App\Repositories\EventRepo;
class EventDetailService
{
    protected $eventRepo;

    public function __construct(EventRepo $eventRepo)
    {
        $this->eventRepo = $eventRepo;
    }

    public function updateDetails($request, $id){
        return $this->eventRepo->updateEventDetails($request, $id);
    }
}