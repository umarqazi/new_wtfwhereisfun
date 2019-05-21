<?php

namespace App\Repositories;

use App\Event;
use App\EventTicket;
use App\EventTag;
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
        $event->is_draft                    =       1;
        $event->is_online                   =       $request->is_online;
        $event->is_shareable                =       $isShareable;
        $event->additional_message          =       $request->additional_message;
        $event->refund_policy_id            =       $request->refund_policy;
        $event->user_id                     =       Auth::user()->id;
        $event->status                      =       0;
        $event->organizer_id                =       $request->organizer_id;
        $event->is_cancelled                =       0;
        $event->is_approved                 =       1;
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
        $event->category_id                 =       $request->category;
        $event->event_type_id               =       $request->event_type;;

        $event->save();
        return $event;
    }

    public function getEventTickets($id){
        return Event::find($id)->tickets;
    }

    public function liveEvents($vendorId){
        $liveEvents = $this->eventModel->where(['is_published' => 1, 'deleted_at' => null, 'is_approved' => 1])->where('is_cancelled', '!=', 1)->where('is_draft', '!=', 1)->whereHas('time_locations', function($query){
            return $query->where('starting', '<=', now())->where('ending', '>=', now());
        });

        if(!is_null($vendorId)){
            $liveEvents->where('user_id', $vendorId);
        }
        return $liveEvents->get();
    }

    public function draftEvents($vendorId){
        $draftEvents = $this->eventModel->where(['deleted_at' => null, 'is_draft' => 1]);

        if(!is_null($vendorId)){
            $draftEvents->where('user_id', $vendorId);
        }
        return $draftEvents->get();
    }

    public function pastEvents($vendorId){
        $pastEvents = $this->eventModel->where(['is_published' => 1, 'deleted_at' => null, 'is_approved' => 1])->where('is_cancelled', '!=', 1)->where('is_draft', '!=', 1)->whereHas('time_locations', function($query){
            return $query->where('starting', '<=', now())->where('ending', '<=', now());
        })->whereDoesntHave('time_locations', function($query){
            return $query->where('starting', '<=', now())->where('ending', '>=', now());
        })->whereDoesntHave('time_locations', function($query){
            return $query->where('starting', '>', now())->where('ending', '>', now());
        });

        if(!is_null($vendorId)){
            $pastEvents->where('user_id', $vendorId);
        }
        return $pastEvents->get();
    }

    public function allEvents($vendorId){
        $allEvents = $this->eventModel->where('deleted_at', null);
        if(!is_null($vendorId)){
            $allEvents->where('user_id', $vendorId);
        }
        return $allEvents->get();
    }

    public function getMoreEvents($vendor, $event){
        return $this->eventModel->where('id','!=', $event)->publishedEvents($vendor)->orderBy('created_at', 'desc')->has('time_locations')->limit(2)->get();
    }

    public function goLive($id){
        $event = $this->eventModel->find($id);
        $event->status                      =       1;
        $event->is_published                =       1;
        $event->is_draft                    =       0;
        $event->save();
        return $event;
    }

    public function hotEvents(){
        return $this->eventModel->has('hot_deal')->get();

    }

    public function updateEventUrl($id, $request){
        return $this->eventModel->where('id', $id)->update(['slug' => $request['url'].'-'.$request['id']]);
    }

    public function getEventBySlug($slug){
        return $this->eventModel->where('slug', $slug)->first();
    }

    public function updateStripeProductId($eventId, $product){
        return $this->eventModel->where('id', $eventId)->update(['stripe_product_id' => $product['id']]);
    }

    public function getEventsByCategory($id){
        return $this->eventModel->where('category_id', $id)->get();
    }
}
