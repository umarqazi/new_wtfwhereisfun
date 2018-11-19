<?php
namespace App\Services\Events;

use App\Repositories\EventHotDealRepo;
use Carbon\Carbon;
use App\Jobs\RemoveHotDeal;
class EventHotDealService
{
    protected $eventHotDealRepo;

    public function __construct()
    {
        $this->eventHotDealRepo = new EventHotDealRepo;
    }

    public function makeHotDeal($request){
        $data   = ['start' => Carbon::now(), 'end' => Carbon::now()->addHours($request->hours)];
        $hotDeal = $this->eventHotDealRepo->makeHotDeal($request, $data);
//        RemoveHotDeal::dispatch($hotDeal)->delay($data['end']);
        return $hotDeal;
    }

    public function removeHotDeal($id){
        $response = $this->eventHotDealRepo->removeHotDeal($id);
        return $response;
    }

    public function checkIfDealExists($eventId){
        $response = $this->eventHotDealRepo->checkIfDealExists($eventId);
        if(!empty($response)){
            $hotDealDetails = ['hotDeal' => true, 'details' => $response];
        }else{
            $hotDealDetails = ['hotDeal' => false, 'details' => ''];
        }
        return $hotDealDetails;
    }

    public function getHotDealDetails($eventId){
        return $this->checkIfDealExists($eventId);
    }
}