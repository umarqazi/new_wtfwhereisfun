<?php

namespace App\Services\Events;

use App\Repositories\EventRepo;
class EventDetailService
{
    protected $eventRepo;

    public function __construct()
    {
        $this->eventRepo = new EventRepo();
    }

    public function updateDetails($request, $id){
        return $this->eventRepo->updateEventDetails($request, $id);
    }
}