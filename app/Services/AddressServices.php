<?php

namespace App\Services;

use App\Repositories\AddressRepo;
use Illuminate\Http\Response;
class AddressServices
{
    protected $addressRepo;

    public function __construct(){
        $this->addressRepo = new AddressRepo();
    }

    public function getAllCountries(){
        return $this->addressRepo->allCountries();
    }

    /**
     * @param int $country Primary key of Country model
     * @param string $requestType
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStatesByCountry($country, $requestType = ''){
        $states = $this->addressRepo->statesByCountry($country);
        if($requestType == 'ajax'){
            $options = '';
            foreach($states as $state){
                $options .= "<option value='{$state->id}'>{$state->name}</option>";
            }
            return response()->json($options);
        }else{
            return $states;
        }
    }

    public function getCitiesByState($state, $requestType = ''){
        $cities = $this->addressRepo->citiesByState($state);
        if($requestType == 'ajax'){
            $options = '';
            foreach($cities as $city){
                $options .= "<option value='{$city->id}'>{$city->name}</option>";
            }
            return response()->json($options);
        }else{
            return $cities;
        }
    }
}