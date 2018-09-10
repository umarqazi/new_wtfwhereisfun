<?php

namespace App\Repositories;

use App\Event;
use App\EventTicket;
use App\EventTimeLocation;
use Illuminate\Support\Facades\Auth;
class EventRepo
{
    public function create($request){
        if($request->access == 'public'){
            $isShareable = 0;
        }else{
            $isShareable = $request->is_shareable;
        }
        $event = new Event;

        $event->title                       =       $request->title;
        $event->description                 =       $request->description;
        $event->contact                     =       $request->contact;
        $event->referral_code               =       $request->referral_code;
        $event->discount                    =       $request->discount;
        $event->access                      =       $request->access;
        $event->slug                        =       str_replace(' ','-', $request->title);
        $event->is_draft                    =       1;
        $event->is_online                   =       $request->is_online;
        $event->is_shareable                =       $isShareable;
        $event->additional_message          =       $request->additional_message;
        $event->refund_policy_id            =       $request->refund_policy;
        $event->user_id                     =       Auth::user()->id;
        $event->status                      =       0;

        $event->save();
        return $event;
    }

    public function getByID($id){
        $event = Event::find($id);
        return $event;
    }

    public function updateEventDetails($request, $id){
        if($request->access == 'public'){
            $isShareable = 0;
        }else{
            $isShareable = $request->is_shareable;
        }

        $event  = Event::find($id);

        $event->title                       =       $request->title;
        $event->description                 =       $request->description;
        $event->contact                     =       $request->contact;
        $event->referral_code               =       $request->referral_code;
        $event->discount                    =       $request->discount;
        $event->access                      =       $request->access;
        $event->slug                        =       str_replace(' ','-', $request->title);
        $event->is_online                   =       $request->is_online;
        $event->is_shareable                =       $isShareable;
        $event->additional_message          =       $request->additional_message;
        $event->refund_policy_id            =       $request->refund_policy;

        $event->save();
        return $event;
    }

    public function updateTopics($request, $id){
        $event  = Event::find($id);

        $event->event_topic_id              =       $request->event_topic;
        $event->event_sub_topic_id          =       $request->event_sub_topic;
        $event->category_id                 =       $request->event_type;
        $event->event_type_id               =       $request->category;

        $event->save();
        return $event;
    }

    public function getEventLocations($id){
        return Event::find($id)->time_locations;
    }

    public function updateTimeLocation($request, $eventId){
        if($request->request_type == 'store'){
            $eventTimeLocation = new EventTimeLocation;
            $eventTimeLocation->event_id            =       $eventId;
        }else{
            $eventTimeLocation = EventTimeLocation::find($request->time_location_id);
        }
        $eventTimeLocation->location                =       $request->event_location;
        $eventTimeLocation->address                 =       $request->event_address;
        $eventTimeLocation->display_currency_id     =       $request->display_currency;
        $eventTimeLocation->transacted_currency_id	=       $request->transacted_currency;
        $eventTimeLocation->longitude               =       $request->longitude;
        $eventTimeLocation->latitude                =       $request->latitude;
        $eventTimeLocation->starting                =       $request->event_start_date;
        $eventTimeLocation->ending                  =       $request->event_end_date;
        $eventTimeLocation->timezone_id             =       $request->timezone;

        $eventTimeLocation->save();
        return $eventTimeLocation;
    }

    public function getEventTickets($id){
        return Event::find($id)->tickets;
    }

    public function updateEventTicket($request, $eventId){
        if($request->request_type == 'store'){
            $eventEventTicket = new EventTicket;
            $eventEventTicket->event_id            =       $eventId;
        }else{
            $eventEventTicket = EventTicket::find($request->ticket_id);
        }
        $eventEventTicket->name                    =       $request->name;
        $eventEventTicket->quantity                =       $request->quantity;
        $eventEventTicket->price                   =       $request->price;
        $eventEventTicket->description             =       $request->description;
        $eventEventTicket->selling_start           =       $request->selling_start;
        $eventEventTicket->selling_end             =       $request->selling_end;
        $eventEventTicket->status                  =       $request->status;
        $eventEventTicket->min_order               =       $request->min_order;
        $eventEventTicket->max_order               =       $request->max_order;
        $eventEventTicket->type                    =       $request->type;

        $eventEventTicket->save();
        return $eventEventTicket;
    }
}
