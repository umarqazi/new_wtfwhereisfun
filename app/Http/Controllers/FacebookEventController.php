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
use Alert;
class FacebookEventController
{
    protected $eventService;
    protected $eventLocationService;
    protected $facebookService;
    protected $userServices;

    /**
     * FacebookEventController constructor.
     */
    public function __construct()
    {
        $this->eventService                 = new EventService();
        $this->eventLocationService         = new EventTimeLocationService();
        $this->facebookService              = new FacebookService();
        $this->userServices                 = new UserServices();
    }

    /**
     * @param $locationId
     * @return $this
     */
    public function addToFacebook($locationId){
        $locationId         = decrypt_id($locationId);
        $event              = $this->eventLocationService->getLocationEvent($locationId);
        $location           = $this->eventLocationService->getTimeLocation($locationId);
        if(empty($event->vendor->facebook_id)){
            Session::put('url', URL::current());
            return View('events.add-to-facebook')->with(['event' => $event, 'location' => $location]);
        }else{
            $userFbPages = $this->facebookService->getUserFacebookPages($event->vendor);
            if(count($userFbPages)){
                Alert::error(Config::get('constants.FACEBOOK_EMPTY_PAGES', 'Error'))->autoclose(3000);
                return View('events.add-to-facebook')->with(['event' => $event, 'location' => $location]);
            }else{
                return View('events.facebook-event-form')->with(['event' => $event, 'location' => $location, 'fbPages' => $userFbPages ]);
            }
        }
    }

    /**
     * @return mixed
     */
    public function connectToFacebook(){
        return Socialite::driver('facebook')->scopes(['manage_pages', 'publish_pages'])->redirect();
    }

}