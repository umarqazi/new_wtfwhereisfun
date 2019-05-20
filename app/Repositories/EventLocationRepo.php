<?php
namespace App\Repositories;
use App\Event;
use App\EventTimeLocation;
use Carbon\Carbon;
class EventLocationRepo
{
    protected $eventLocationModel;
    protected $eventModel;

    public function __construct()
    {
        $this->eventLocationModel        = new EventTimeLocation;
        $this->eventModel                = new Event;
    }

    public function updateTimeLocation($request, $eventId){
        if($request->request_type == 'store'){
            $eventTimeLocation = new EventTimeLocation;
            $eventTimeLocation->event_id            =       $eventId;
        }else{
            $eventTimeLocation = EventTimeLocation::find($request->time_location_id);
        }

        $startDate = Carbon::parse($request->event_start_date);
        $endDate   = Carbon::parse($request->event_end_date);
        $eventTimeLocation->location                =       $request->event_location;
        $eventTimeLocation->address                 =       $request->event_address;
        $eventTimeLocation->display_currency_id     =       $request->display_currency;
        $eventTimeLocation->transacted_currency_id	=       $request->transacted_currency;
        $eventTimeLocation->longitude               =       $request->longitude;
        $eventTimeLocation->latitude                =       $request->latitude;
        $eventTimeLocation->starting                =       $startDate->format('Y-m-d H:i:s');
        $eventTimeLocation->ending                  =       $endDate->format('Y-m-d H:i:s');
        $eventTimeLocation->timezone_id             =       $request->timezone;

        $eventTimeLocation->save();
        return $eventTimeLocation;
    }

    public function getEventLocations($id){
        return Event::find($id)->time_locations;
    }

    public function getTimeLocation($id){
        return $this->eventLocationModel->find($id);
    }

    public function getLocationEvent($locationId){
        $location = $this->eventLocationModel->find($locationId);
        return $location->event;
    }

    public function getAllEventsByTime($vendorId){
        $allEvents = $this->eventLocationModel->whereHas('event', function($query) use ($vendorId){
            $query->allEvents($vendorId);
        });
        return $allEvents->get();
    }

    public function getAllPublishedEventsByTimeAndLocation($vendorId){
        $allEvents = $this->eventLocationModel->whereHas('event', function($query) use ($vendorId){
            $query->publishedEvents($vendorId);
        });
        return $allEvents->get();
    }

    public function getTodayEventsByTime($vendorId){
        $liveEvents = $this->eventLocationModel->todayEvents()->whereHas('event', function($query) use ($vendorId){
            $query->publishedEvents($vendorId);
        });
        return $liveEvents->recentCreatedAt()->get();
    }

    public function getFutureEventsByTime($vendorId){
        $futureEvents = $this->eventLocationModel->futureEvents()->whereHas('event', function($query) use($vendorId){
            $query->publishedEvents($vendorId);
        });
        return $futureEvents->recentCreatedAt()->get();
    }

    public function getDraftEventsByTime($vendorId){
        $draftEvents = $this->eventLocationModel->whereHas('event', function($query) use($vendorId){
            $query->draftEvents($vendorId);
        });
        return $draftEvents->recentCreatedAt()->get();
    }

    //Vendor Listing
    public function getPastEventsByTime($vendorId){
        $pastEvents = $this->eventLocationModel->PastEvents()->whereHas('event', function($query) use ($vendorId){
            $query->publishedEvents($vendorId);
        })->recentCreatedAt()->get();
        return $pastEvents;
    }

    //Vendor Dashboard Filters
    public function getPastEvents($start, $end, $userId){
        $eventLocations = $this->eventLocationModel->where('starting', '>=', $start)->where('ending', '<=', $end)->whereHas('event', function($query) use ($userId){
            $query->publishedEvents($userId);
        });
        return $eventLocations;
    }

    public function hotEvents(){
        $vendorId = null;
        $hotDeals = $this->eventLocationModel->todayEvents()->whereHas('event', function($query) use ($vendorId){
            $query->publishedEvents($vendorId);
        })->has('hot_deal')->get();
        return $hotDeals;
    }

    public function search($data){
//        dump($data['event-start-date']);
        $start_date = date('Y-m-d H:i:s', strtotime($data['event-start-date']));
        $end_date = date('Y-m-d H:i:s', strtotime($data['event-end-date']));
        /*dump($start_date);
        dump($end_date);*/

        /*$events = $this->eventLocationModel->eventsByDate($start_date, $end_date)->searchByLocation($data['location'])->whereHas('event', function($query) use ($data){
            if(isset($data['search_events'])){
                $query->publishedEvents()->searchByTitle($data['search_events'])->searchByDescription($data['search_events'])->publicAccess();
            } else{

            }
            $query->publishedEvents()->publicAccess();
        })->get();

        dd($events);*/

//        dd($events);
        if(isset($data['search_events'])){
            $locationWise = $this->eventLocationModel->eventsByDate($start_date, $end_date)->searchByLocation($data['location'])->whereHas('event', function($query) use ($data){
                $query->publishedEvents()->searchByTitle($data['search_events'])->searchByDescription($data['search_events'])->publicAccess();
            })->get();
        }else{
            $locationWise = $this->eventLocationModel->eventsByDate($start_date, $end_date)->searchByLocation($data['location'])->whereHas('event', function($query){
                $query->publishedEvents()->publicAccess();
            })->get();
        }
//                dd($locationWise);

        /* IF No Events Found with Selected Location. Then Find Events in other Locations. */
        $collection = [];
        if(isset($data['search_events'])){
            $eventWise = $this->eventModel->publishedEvents()->publicAccess()->searchByTitle($data['search_events'])->searchByDescription($data['search_events'])->whereHas('time_locations', function($query) use ($data){
                $query->eventsByDate($data['event-start-date'], $data['event-end-date']);
            })->get();
            if(count($eventWise)) {
                foreach ($eventWise as $event) {
                    foreach ($event->time_locations as $time) {
                        array_push($collection, $time);
                    }
                }
            }
        }

//        echo '==========';
//        dd($collection);
        $searchResults = $locationWise->merge($collection);
        return $searchResults;
    }
}