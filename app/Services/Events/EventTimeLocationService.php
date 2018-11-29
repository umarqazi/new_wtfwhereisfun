<?php

namespace App\Services\Events;
use App\Services\Events\EventOrderService;
use Illuminate\Support\Facades\App;
use App\Repositories\EventLocationRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;
use Mapper;
use View;
class EventTimeLocationService extends BaseService
{
    protected $eventLocationRepo;
    protected $eventOrderService;

    public function __construct()
    {
        $this->eventLocationRepo    = new EventLocationRepo;
        $this->eventOrderService    = new EventOrderService;
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

    public function getTimeLocation($locationId){
        return $this->eventLocationRepo->getTimeLocation($locationId);
    }

    public function getTodayEventsMapMarkers($locations, $lat, $lng){
        Mapper::map($lat, $lng);
        if(count($locations)){
            foreach($locations as $key => $location){
                if(!empty($location->event->header_image)){
                    $headerImg = $location->event->directory.$location->event->header_image;
                }else{
                    $headerImg = asset('img/dummy.png');
                }
                $link = route('showById', ['id' => encrypt_id($location->event->id), 'locationId' => encrypt_id($location->id)]);
                $date = $location->starting->format('D, M d').' - '.$location->ending->format('D, M d');
                $time = $location->starting->format('g:i A').' - '.$location->ending->format('g:i A');
                $informationWindow = "<div class=\"map-event-details\">
                                <div class=\"event-image\">
                                    <img src=\"{$headerImg}\" width=\"200\" height=\"200\">
                                </div>
                                <div class=\"event-info\">
                                    <h4><a href=\"{$link}\">{$location->event->title}</a></h4>
                                    <p><i class=\"fa fa-map-marker green\"></i> {$location->location}</p>
                                    <p><i class=\"fa fa-calendar green\"></i> {$date}</p>
                                    <p><i class=\"fa fa-clock-o green\"></i> {$time}</p>
                                </div>
                            </div>";
                Mapper::informationWindow($location->latitude, $location->longitude, $informationWindow);
            }
        }
    }

    public function getUserLocation(){
        if (App::environment('local')) {
            $ip = '202.166.174.53';
        }else{
            $ip = \Request::ip();
        }
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        $latlng = explode(",",$details->loc);
        return ['city' => $details->city, 'lat' => $latlng[0], 'lng' => $latlng[1]];
    }

    public function getLocationEvent($locationId){
        return $this->eventLocationRepo->getLocationEvent($locationId);
    }
}