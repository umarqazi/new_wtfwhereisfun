<?php

namespace App\Services\Events;

use Illuminate\Support\Facades\Config;
class FacebookService
{
    /**
     * @var \Facebook\Facebook
     */
    protected $facebookSdk;

    /**
     * FacebookService constructor.
     */
    public function __construct()
    {
        $this->facebookSdk  = new \Facebook\Facebook([
            'app_id'    => Config::get('constants.FACEBOOK_APP_ID'),
            'app_secret'=> Config::get('constants.FACEBOOK_APP_SECRET')
        ]);
    }

    /**
     * @param $user
     * @return array
     */
    public function getUserFacebookPages($user){
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $this->facebookSdk->get('/'.$user->facebook_id.'/accounts', $user->fb_access_token);
            } catch(\Facebook\Exceptions\FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch(\Facebook\Exceptions\FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
        $graphEdge = $response->getGraphEdge();
        $facebookPages = [];
        // Iterate over all the GraphNode's returned from the edge
        if(!is_null($graphEdge->getTotalCount())) {
            foreach($graphEdge as $graphNode){
                array_push($facebookPages, ['id' => $graphNode['id'], 'name' => $graphNode['name']]);
            }
        }
        return $facebookPages;
    }

}