<?php

namespace App\Repositories;

use App\Event;
use App\EventTicket;
use App\EventTag;
use App\EventTimeLocation;
use App\TicketPass;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class EventRepo
{
    public function __construct()
    {
        $this->eventModel   =   new Event;
    }

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
        $event->organizer_id                =       $request->organizer_id;
        $event->is_cancelled                =       0;
        $event->is_approved                 =       0;
        $event->is_published                =       0;

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
        $event->organizer_id                =       $request->organizer_id;

        $event->save();
        return $event;
    }

    public function updateTopics($request, $id){
        $event  = Event::find($id);

        $event->event_topic_id              =       $request->event_topic;
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

    public function liveEvents(){
        return $this->eventModel->where(['user_id' => Auth::user()->id, 'is_published' => 1, 'deleted_at' => null, 'is_approved' => 1])->where('is_cancelled', '!=', 1)->where('is_draft', '!=', 1)->whereHas('time_locations', function($query){
            return $query->where('starting', '<=', now())->where('ending', '>=', now());
        })->get();
    }

    public function draftEvents(){
        return $this->eventModel->where(['user_id' => Auth::user()->id, 'deleted_at' => null, 'is_draft' => 1])->get();
    }

    public function pastEvents(){
        return $this->eventModel->where(['user_id' => Auth::user()->id, 'is_published' => 1, 'deleted_at' => null, 'is_approved' => 1])->where('is_cancelled', '!=', 1)->where('is_draft', '!=', 1)->whereHas('time_locations', function($query){
            return $query->where('starting', '<=', now())->where('ending', '<=', now());
        })->whereDoesntHave('time_locations', function($query){
            return $query->where('starting', '<=', now())->where('ending', '>=', now());
        })->whereDoesntHave('time_locations', function($query){
            return $query->where('starting', '>', now())->where('ending', '>', now());
        })->get();
    }

    public function getMoreEvents($vendor, $event){
        return $this->eventModel->where('user_id', $vendor)->where('id','!=', $event)->orderBy('created_at', 'desc')->limit(2)->get();
    }

    public function goLive($request){
        $event = $this->eventModel->find(decrypt_id($request->event_id));
        $event->status                      =       1;
        $event->is_published                =       1;
        $event->is_draft                    =       0;
        $event->save();
    }
}
