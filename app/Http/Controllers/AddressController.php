<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Services\AddressServices;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Alert;
use App\Role;
use Illuminate\Support\Facades\Hash;

class AddressController extends Controller
{
    protected  $userServices;

    public function __construct(AddressServices $addressServices)
    {
        $this->addressServices = $addressServices;
    }

    public function getCountryStates(Request $request){
        $requestType = 'ajax';
        $response = $this->addressServices->getStatesByCountry((int)$request->country, $requestType);
        return $response;
    }

    public function getStateCities(Request $request){
        $requestType = 'ajax';
        $response = $this->addressServices->getCitiesByState((int)$request->state, $requestType);
        return $response;
    }
}
