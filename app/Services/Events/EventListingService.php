<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/25/18
 * Time: 6:07 PM
 */

namespace App\Services\Events;


use App\Services\BaseService;
use App\Services\IService;
use App\Repositories\EventRepo;
class EventListingService extends BaseService implements IService
{
    protected $eventRepo;

    public function __construct(EventRepo $eventRepo)
    {
        $this->eventRepo = $eventRepo;
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