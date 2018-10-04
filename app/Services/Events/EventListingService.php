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

    public function getLiveEvents($id){
        return $this->eventRepo->liveEvents($id);
    }

    public function getDraftEvents($id){
        return $this->eventRepo->draftEvents($id);
    }

    public function getPastEvents($id){
        return $this->eventRepo->pastEvents($id);
    }
}