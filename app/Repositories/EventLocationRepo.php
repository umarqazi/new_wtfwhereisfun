<?php
namespace App\Repositories;
use App\Event;
use App\EventTimeLocation;
use Carbon\Carbon;
class EventLocationRepo
{
    protected $eventLocationModel;

    public function __construct()
    {
        $this->eventLocationModel        =       new EventTimeLocation;
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

    public function getTodayEventsByTime(){
        $liveEvents = $this->eventLocationModel->todayEvents()->whereHas('event', function($query){
            $query->where(['is_published' => 1, 'deleted_at' => null, 'is_approved' => 1])->where('is_cancelled', '!=', 1)->where('is_draft', '!=', 1);
        });
        return $liveEvents->get();
    }
}