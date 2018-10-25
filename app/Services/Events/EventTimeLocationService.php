<?php

namespace App\Services\Events;

use App\Repositories\EventLocationRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;
use Mapper;
use View;
class EventTimeLocationService extends BaseService
{
    protected $eventLocationRepo;

    public function __construct()
    {
        $this->eventLocationRepo    = new EventLocationRepo;
    }

    public function updateTimeLocation($request, $eventId){
        return $this->eventLocationRepo->updateTimeLocation($request, $eventId);
    }

    public function searchLocation($request){
        $location = Mapper::location($request->location);
        return $location;
    }

    public function addNewLocation($currencies, $timeZones, $eventID, $elementId){
        Mapper::map(53.381128999999990000, -1.470085000000040000);
        View::share('javascript', true);
        $map = Mapper::render();
        $html = addNewTimeLocationRow($currencies, $timeZones, $eventID, $map, $elementId);
        return $html;
    }

    public function getEventLocations($event_id, $renderMap = false){
        $locations = $this->eventLocationRepo->getEventLocations($event_id);
        $html = '';
        if(count($locations)){
            if($renderMap) {
                $maps = [];
                foreach ($locations as $location) {
                    Mapper::map($location->latitude, $location->longitude);
                }
            }
            return $locations;
        }else{
            if($renderMap) {
                Mapper::map(53.381128999999990000, -1.470085000000040000);
            }
            return [];
        }
    }

    public function getTimeLocation($request){
        $locationId = decrypt_id($request->location_id);
        return $this->eventLocationRepo->getTimeLocation($locationId);
    }
}