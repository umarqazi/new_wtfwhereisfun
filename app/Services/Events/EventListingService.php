<?php
namespace App\Services\Events;

use App\Services\BaseService;
use App\Services\IService;
use App\Repositories\EventRepo;
use Illuminate\Support\Facades\Auth;
class EventListingService extends BaseService implements IService
{
    protected $eventRepo;

    public function __construct()
    {
        $this->eventRepo = new EventRepo();
    }

    public function getLiveEvents($vendorId = null){
        return $this->eventRepo->liveEvents($vendorId);
    }

    public function getDraftEvents($vendorId = null){
        return $this->eventRepo->draftEvents($vendorId);
    }

    public function getPastEvents($vendorId = null){
        return $this->eventRepo->pastEvents($vendorId);
    }

    public function getAllEvents($vendorId = null){
        return $this->eventRepo->allEvents($vendorId);
    }

    public function getVendorEvents(){
        $vendorId    = Auth::user()->id;
        $draftEvents = $this->getDraftEvents($vendorId);
        $liveEvents  = $this->getLiveEvents($vendorId);
        $pastEvents  = $this->getPastEvents($vendorId);
        $allEvents   = $this->getAllEvents($vendorId);
        return ['draftEvents' => $draftEvents, 'liveEvents' => $liveEvents, 'pastEvents' => $pastEvents, 'allEvents' => $allEvents];
    }

    public function getHotDealEvents(){
        return $this->eventRepo->hotEvents();
    }
}