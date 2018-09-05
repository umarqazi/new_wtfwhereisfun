<?php


namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Role;
use App\Repositories\AddressRepo;
class UserAddressService
{
    protected $addressRepo;

    public function __construct(AddressRepo $addressRepo){
        $this->addressRepo = $addressRepo;
    }

    public function updateAddress($request){
        $user = Auth::user();
        if($request->is_billing_shipping){
            $this->addressRepo->updateShippingAddress($request, $billingShipping = 1, $user);
            if(!is_null($user->billing_address)){
                $this->addressRepo->removeBillingAddress($user);
            }
        }else{
            $this->addressRepo->updateShippingAddress($request, $billingShipping = 0, $user);
            $this->addressRepo->updateBillingAddress($request, $user);
        }
        return ['shippingAddress' => $user->shipping_address, 'billingAddress' => $user->billing_address];
    }
}
