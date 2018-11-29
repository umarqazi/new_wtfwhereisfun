<?php

namespace App\Services\Events;

use App\Repositories\EventTagRepo;
class EventTagService
{
    protected $eventTagRepo;

    public function __construct()
    {
        $this->eventTagRepo = new EventTagRepo;
    }

    public function store($request, $event){
        $this->eventTagRepo->store($request, $event);

    }

    public function getEventTags($eventId){
        return $this->eventTagRepo->getEventTags($eventId);
    }
}