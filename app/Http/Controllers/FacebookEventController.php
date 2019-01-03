<?php

namespace App\Http\Controllers;

use App\Services\Events\EventService;
use App\Services\Events\EventTimeLocationService;
use App\Services\Events\FacebookService;
use App\Services\UserServices;
use Laravel\Socialite\Facades\Socialite;

class FacebookEventController
{
    protected $eventService;
    protected $eventLocationService;
    protected $facebookService;
    protected $userServices;


    public function __construct()
    {
        $this->eventService                 = new EventService();
        $this->eventLocationService         = new EventTimeLocationService();
        $this->facebookService              = new FacebookService();
        $this->userServices                 = new UserServices();
    }

    public function addToFacebook($locationId){
        $locationId         = decrypt_id($locationId);
        $event              = $this->eventLocationService->getLocationEvent($locationId);
        $location           = $this->eventLocationService->getTimeLocation($locationId);
        if(empty($event->vendor->facebook_id)){
            return View('events.add-to-facebook')->with(['event' => $event, 'location' => $location]);
        }else{

        }

    }

    /**
     * @param $locationId
     * @return mixed
     */
    public function connectToFacebook($locationId){
        $redirectUrl = url('events/facebook/callback');
        return Socialite::driver('facebook')->with(['locationId' => $locationId])->redirectUrl($redirectUrl)->redirect();
    }

    /**
     * @param $locationId
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleFacebookCallBack($provider)
    {
        $user = Socialite::driver($provider)->user();
//        $response = $this->userServices->updateFacebookId(Auth::user()->id, $provider);
        print_r($user.'     User');
        print_r($provider.'      Provider');
        die();
        return redirect(url('events/'.$locationId.'/dashboard/add-to-facebook'));
    }

}