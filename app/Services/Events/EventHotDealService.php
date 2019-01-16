<?php
namespace App\Services\Events;

use App\Repositories\EventHotDealRepo;
use App\Services\Payments\StripeService;
use Carbon\Carbon;
use App\Jobs\RemoveHotDeal;
class EventHotDealService
{
    protected $eventHotDealRepo;
    protected $stripeService;

    public function __construct()
    {
        $this->eventHotDealRepo     = new EventHotDealRepo;
        $this->stripeService        = new StripeService();
    }

    public function makeHotDeal($request){
        $coupon = $this->stripeService->createStripeCoupon($request);
        $data   = ['start' => Carbon::now(), 'end' => Carbon::now()->addHours($request->hours),
            'hours' => $request->hours, 'discount' => $request->discount, 'time_location_id' => decrypt_id($request->location_id),
            'stripe_coupon_id' => $coupon['id']];
        $hotDeal = $this->eventHotDealRepo->makeHotDeal($data);
        RemoveHotDeal::dispatch($hotDeal)->delay($data['end']);
        return $hotDeal;
    }

    /**
     * Remove Hot Deal
     * @param  $locationId
     * @return $response
     */
    public function removeHotDeal($locationId){
        $response = $this->eventHotDealRepo->removeHotDeal($locationId);
        return $response;
    }

    public function checkIfDealExists($locationId){
        $response = $this->eventHotDealRepo->checkIfDealExists($locationId);
        if(!empty($response)){
            $hotDealDetails = ['hotDeal' => true, 'details' => $response];
        }else{
            $hotDealDetails = ['hotDeal' => false, 'details' => ''];
        }
        return $hotDealDetails;
    }

    public function getHotDealDetails($locationId){
        return $this->checkIfDealExists($locationId);
    }
}