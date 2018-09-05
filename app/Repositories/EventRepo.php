<?php

namespace App\Repositories;

use App\Event;
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
}
