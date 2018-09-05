<?php

namespace App\Repositories;

use App\Country;
use App\State;
use App\City;
use App\ShippingAddress;
use App\BillingAddress;

class AddressRepo
{
    public function allCountries(){
        return Country::all();
    }

    public function statesByCountry($country){
        $country = Country::find($country);
        return $country->states;
    }

    public function citiesByState($state){
        $state = State::find($state);
        return $state->cities;
    }

    public function updateShippingAddress($request, $billingShipping, $user){
        if(is_null($user->shipping_address)){
            $shippingAddress = new ShippingAddress([
                'address'               =>  $request->shipping_address,
                'zip_code'              =>  $request->shipping_zipcode,
                'city_id'               =>  $request->shipping_city,
                'is_billing_shipping'   =>  $billingShipping
            ]);
            $user->shipping_address()->save($shippingAddress);
        }else{
            $user->shipping_address->update([
                'address'               =>  $request->shipping_address,
                'zip_code'              =>  $request->shipping_zipcode,
                'city_id'               =>  $request->shipping_city,
                'is_billing_shipping'   =>  $billingShipping
            ]);
        }
    }

    public function updateBillingAddress($request, $user){
        if(is_null($user->billing_address)){
            $billingAddress = new BillingAddress([
                'address'               =>  $request->billing_address,
                'zip_code'              =>  $request->billing_zipcode,
                'city_id'               =>  $request->billing_city,
            ]);
            $user->billing_address()->save($billingAddress);
        }else{
            $user->billing_address->update([
                'address'               =>  $request->billing_address,
                'zip_code'              =>  $request->billing_zipcode,
                'city_id'               =>  $request->billing_city
            ]);
        }
    }

    public function removeBillingAddress($user){
        $user->billing_address()->delete();
    }
}