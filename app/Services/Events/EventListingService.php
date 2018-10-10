<?php
namespace App\Services\Events;

use App\Services\BaseService;
use App\Services\IService;
use App\Repositories\EventRepo;
class EventListingService extends BaseService implements IService
{
    protected $eventRepo;

    public function __construct()
    {
        $this->eventRepo = new EventRepo();
    }

    public function getLiveEvents(){
        return $this->eventRepo->liveEvents();
    }

    public function getDraftEvents(){
        return $this->eventRepo->draftEvents();
    }

    public function getPastEvents(){
        return $this->eventRepo->pastEvents();
    }

    public function getVendorEvents(){
        $draftEvents = $this->getDraftEvents();
        $liveEvents = $this->getLiveEvents();
        $pastEvents = $this->getPastEvents();
        return ['draftEvents' => $draftEvents, 'liveEvents' => $liveEvents, 'pastEvents' => $pastEvents];
    }
}