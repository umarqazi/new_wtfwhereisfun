<?php

namespace App\Repositories;

use App\EventHotDeal;
use App\Repositories\EventRepo;
class EventHotDealRepo
{
    protected $hotdealModel;
    protected $eventRepo;

    public function __construct()
    {
        $this->hotdealModel = new EventHotDeal;
        $this->eventRepo   = new EventRepo;
    }

    public function makeHotDeal($request, $data){
        $hotDeal = $this->hotdealModel->create([
            'hours'         =>  $request->hours,
            'discount'      =>  $request->discount,
            'start_time'    =>  $data['start'],
            'end_time'      =>  $data['end'],
            'event_id'      =>  decrypt_id($request->event_id),
        ]);

        return $hotDeal;
    }

    public function removeHotDeal($id){
        $event = $this->eventRepo->getByID($id);
        if($event->hot_deal->exists()){
            $event->hot_deal->delete();
            return true;
        }
        return false;
    }

    public function checkIfDealExists($eventId){
        return $this->hotdealModel->where('event_id', $eventId)->first();
    }

}