<?php
namespace App\Services\Events;

use Carbon\Carbon;
class EventCalendarService
{
    protected $eventListingService;

    public function __construct()
    {
        $this->eventListingService    = new EventListingService;
    }

    public function getVendorEventsCalendar($vendorId){
        $timeLocations = $this->eventListingService->getAllEventsByTimeAndLocation($vendorId);
        $events = [];
        foreach($timeLocations as $location) {
            if ($location->event->is_draft == 1) {
                $color = '#EEE8AA';
            } else if ($location->ending >= Carbon::now()) {
                $color = '#86C543';
            } else {
                $color = '#e0e0e0';
            }

            $events[] = \Calendar::event(
                str_limit($location->event->title, 10, '...').' ('.str_limit($location->location, 8, '...').')' , //event title
                true, //full day event?
                $location->starting, //start time (you can also use Carbon instead of DateTime)
                $location->ending, //end time (you can also use Carbon instead of DateTime)
                $location->id, //optionally, you can specify an event ID
                [
                    'color' => $color,
                    'data' => $location,
                    'slotEventOverlap' => true,
                    'displayEventTime'  => false
                ]

            );
        }

        $calendar = \Calendar::addEvents($events)
            ->setCallbacks([
                    'eventClick' => 'function(event) {
                showEventDetails(event);
            }'
        ]); //add an array with addEvents
        return $calendar;
    }

}