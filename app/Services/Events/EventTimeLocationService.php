<?php

namespace App\Services\Events;

use App\Repositories\EventRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;
use Mapper;
use View;
class EventTimeLocationService extends BaseService
{
    protected $eventRepo;

    public function __construct()
    {
        $this->eventRepo   = new EventRepo();
    }

    public function updateTimeLocation($request, $eventId){
        return $this->eventRepo->updateTimeLocation($request, $eventId);
    }

    public function searchLocation($request){
        $location = Mapper::location($request->location);
        return $location;
    }

    public function addNewLocation($currencies, $timeZones, $eventID){
        Mapper::map(53.381128999999990000, -1.470085000000040000);
//        View::share('javascript', true);
        $map = Mapper::render();
        $html = addNewTimeLocationRow($currencies, $timeZones, $eventID, $map);
        return $html;
    }

    public function getEventLocations($event_id){
        $locations = $this->eventRepo->getEventLocations($event_id);
        $html = '';
        if(count($locations)){
            $maps = [];
            foreach($locations as $location){
                Mapper::map($location->latitude , $location->longitude);
//                View::share('javascript', true);
            }
            return $locations;
        }else{
            Mapper::map(53.381128999999990000, -1.470085000000040000);
            return [];
        }
    }
}