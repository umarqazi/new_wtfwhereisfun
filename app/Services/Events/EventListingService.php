<?php
namespace App\Services\Events;

use App\Services\BaseService;
use App\Services\IService;
use App\Repositories\EventRepo;
use App\Repositories\EventLocationRepo;
use Illuminate\Support\Facades\Auth;
class EventListingService extends BaseService implements IService
{
    protected $eventRepo;
    protected $eventLocationRepo;
    protected $eventTimeLocationService;

    public function __construct()
    {
        $this->eventRepo                    = new EventRepo();
        $this->eventLocationRepo            = new EventLocationRepo();
        $this->eventRevenueService          = new EventRevenueService();
        $this->eventTimeLocationService     = new EventTimeLocationService();
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
        return $this->eventLocationRepo->hotEvents();
    }

    public function getLiveEventsByTimeAndLocation($vendorId = null){
        return $this->eventLocationRepo->getLiveEventsByTime($vendorId);
    }

    public function getTodayEventsByTimeAndLocation($vendorId = null){
        $location = $this->eventTimeLocationService->getUserLocation();
        return $this->eventLocationRepo->getTodayEventsByTime($vendorId, $location);
    }

    public function getFutureEventsByTimeAndLocation($vendorId = null){
        $location = $this->eventTimeLocationService->getUserLocation();
        return $this->eventLocationRepo->getFutureEventsByTime($vendorId, $location);
    }

    public function getPastEventsByTimeAndLocation($vendorId = null){
        return $this->eventLocationRepo->getPastEventsByTime($vendorId);
    }

    public function getDraftEventsByTimeAndLocation($vendorId = null){
        return $this->eventLocationRepo->getDraftEventsByTime($vendorId);
    }

    public function getAllPublishedEventsByTimeAndLocation($vendorId = null){
        return $this->eventLocationRepo->getAllPublishedEventsByTimeAndLocation($vendorId);
    }

    public function getAllEventsByTimeAndLocation($vendorId = null){
        return $this->eventLocationRepo->getAllEventsByTime($vendorId);
    }

    public function getTrendingEvents()
    {
        $trending_events = array();
        $events = $this->eventLocationRepo->trendingEvents();

        foreach ($events as $event){
            $ticketsSold = $this->eventRevenueService->getPercentageTicketsSoldByLocation($event['id']);
            if ($ticketsSold >= 40){
                array_push($trending_events, $event);
            }
        }
        return $trending_events;
    }

}