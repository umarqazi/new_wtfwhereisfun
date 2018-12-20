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
    }

    public function makeHotDeal($data){
        $hotDeal = $this->hotdealModel->create([
            'hours'             =>  $data['hours'],
            'discount'          =>  $data['discount'],
            'start_time'        =>  $data['start'],
            'end_time'          =>  $data['end'],
            'time_location_id'  =>  $data['time_location_id'],
            'stripe_coupon_id'  =>  $data['stripe_coupon_id']
        ]);
        return $hotDeal;
    }

    public function removeHotDeal($locationId){
        $hotDeal = $this->checkIfDealExists($locationId);
        if(!empty($hotDeal)){
            $hotDeal->delete();
            return true;
        }
        return false;
    }

    public function checkIfDealExists($locationId){
        return $this->hotdealModel->where('time_location_id', $locationId)->first();
    }

}