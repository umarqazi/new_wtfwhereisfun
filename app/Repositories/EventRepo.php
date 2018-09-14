<?php

namespace App\Repositories;

use App\Event;
use App\EventTicket;
use App\EventTimeLocation;
use App\TicketPass;
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
            $eventTicket = new EventTicket;
            $eventTicket->event_id            =       $eventId;
        }else{
            $eventTicket = EventTicket::find($request->ticket_id);
        }
        $eventTicket->name                    =       $request->name;
        $eventTicket->quantity                =       $request->quantity;
        $eventTicket->price                   =       $request->price;
        $eventTicket->description             =       $request->description;
        $eventTicket->selling_start           =       $request->selling_start;
        $eventTicket->selling_end             =       $request->selling_end;
        $eventTicket->status                  =       $request->status;
        $eventTicket->min_order               =       $request->min_order;
        $eventTicket->max_order               =       $request->max_order;
        $eventTicket->type                    =       $request->type;
        $eventTicket->availability            =       $request->availability;

        $eventTicket->save();
        return $eventTicket;
    }

    public function deleteTicket($request){
        $eventTicket = EventTicket::destroy($request->ticket_id);
    }

    public function updateEventTicketPass($request){
        if($request->request_type == 'store'){
            $eventTicketPass = new TicketPass;
            $eventTicketPass->ticket_id      =       $request->ticket_id;
        }else{
            $eventTicketPass = TicketPass::find($request->pass_id);
        }
        $eventTicketPass->name               =       $request->pass_name;

        $eventTicketPass->save();
        return $eventTicketPass;
    }

    public function deleteTicketPass($request){
        $eventTicketPass = TicketPass::destroy($request->pass_id);
    }
}
