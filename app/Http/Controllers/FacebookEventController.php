<?php

namespace App\Http\Controllers;

use App\Services\Events\EventService;
use App\Services\Events\EventTimeLocationService;
use App\Services\Events\FacebookService;
use App\Services\UserServices;
use Illuminate\Support\Facades\URL;
use Request;
use Illuminate\Support\Facades\Session;
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
            Session::put('url', URL::current());
            return View('events.add-to-facebook')->with(['event' => $event, 'location' => $location]);
        }else{
            $fb = new \Facebook\Facebook([
                'app_id' => env('FACEBOOK_APP_ID'),
                'app_secret' => env('FACEBOOK_APP_SECRET')
            ]);
            try {
                // Returns a `Facebook\FacebookResponse` object
                $response = $fb->get(
                    '/{user-id}/accounts',
                    '{access-token}'
                );
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
            $graphNode = $response->getGraphNode();
            dd($response->getGraphUser());

        }
    }

    /**
     * @return mixed
     */
    public function connectToFacebook(){
        return Socialite::driver('facebook')->scopes(['manage_pages', 'publish_pages'])->redirect();
    }

}