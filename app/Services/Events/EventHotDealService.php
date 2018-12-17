<?php
namespace App\Services\Events;

use App\EventHotDeal;
use App\Repositories\EventHotDealRepo;
use Carbon\Carbon;
use App\Jobs\RemoveHotDeal;
use Cartalyst\Stripe\Stripe;
class EventHotDealService
{
    protected $eventHotDealRepo;
    protected $stripeProvider;

    public function __construct()
    {
        $this->eventHotDealRepo     = new EventHotDealRepo;
        $this->stripeProvider   = new Stripe(env('STRIPE_API_KEY', 'sk_test_iTNTzvLIxH136Q6MjRZ3dmM0'));
    }

    public function makeHotDeal($request){
        $coupon = $this->stripeProvider->coupons()->create([
            'duration'      => 'once',
            'percent_off'   => $request->discount,
            'redeem_by'     => strtotime(Carbon::now()->addHours($request->hours)),
            'name'          => $request->discount.'% OFF For '.$request->hours.''
        ]);
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