<?php

namespace App\Services;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserVerification;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPassword;
use App\ResetPassword;
use Illuminate\Support\Facades\Config;
use App\Role;
use App\Services\AddressServices;
use App\Repositories\UserRepo;


class UserServices
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo, AddressServices $addressServices){
        $this->addressServices= $addressServices;
        $this->userRepo = $userRepo;
    }

    public function countUsers(){
        return User::all()->count();
    }

    public function roles(User $user){
        return $user->roles->pluck('name');
    }

    public function verifyUser($token)
    {
        $verification_user = UserVerification::where('token', $token)->first();
        if(isset($verification_user)){
            if(!$verification_user->user->is_verified) {
                $verification_user->user->is_verified = 1;
                $verification_user->user->save();
                $verification_user->delete();
                return 'success';
            }else{
                return 'already-verified';
            }
        }else{
            return 'error';
        }
    }

    public function register($request){
        $user = new User;
        if ($request->has('username')) {
            $user->username     =   $request->username;
            $role               =   'vendor';
        }else{
            $user->first_name   =   $request->first_name;
            $user->last_name    =   $request->last_name;
            $role               =   'normal';
        }

        $user->email            =   $request->email;
        $user->password         =   bcrypt($request->password);
        $user->save();

        $user_verification = UserVerification::create([
            'user_id'   => $user->id,
            'token'     => str_random(30)
        ]);
        $user->assignRole($role);
        Mail::to($user->email)->send(new VerifyMail($user));
        return $user;
    }

    public function login($request){
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();
        if(!empty($user)){
            if (!Hash::check($request->password, $user->password)) {
                return 'incorrect-password';
            } else if($user->is_verified == 0){
                return 'not-verified';
            }else if($user->is_blocked == 1){
                return 'blocked';
            }else if($user->is_deactivated == 1){
                return 'deactivated';
            }

            Auth::attempt($credentials, $request->remember_me);
            return $user;
        }else{
            return 'invalid-user';
        }
    }

    public function forgetPassword($request){
        $user = User::where('email', $request->email)->first();
        if(!empty($user->lost_password)){
            return 'already-forget';
        }else{
            if($user->is_verified){
                if($user->is_social_signup){
                    return 'social-signup';
                }else if($user->is_blocked){
                    return 'blocked';
                }
                $reset_password = ResetPassword::create([
                    'user_id'   => $user->id,
                    'token'     => str_random(30)
                ]);
                Mail::to($user->email)->send(new ForgetPassword($reset_password));
                return 'success';
            }else{
                return 'verify-first';
            }
        }
    }

    public function resetPassword($request){
        $reset_password = ResetPassword::where('token', $request->token)->first();
        if(is_null($reset_password)){
            return 'error';
        }else{
            $user = $reset_password->user;
            $user->password = bcrypt($request->password);
            $user->save();
            $reset_password->delete();
            return 'success';
        }
    }

    public function accountSettings(){
        $user = Auth::user();
        $shippingAddress = $user->shipping_address;
        $billingAddress  = $user->billing_address;
        $countries       = $this->addressServices->getAllCountries();
        if(!is_null($shippingAddress) && !empty($shippingAddress->city)){
            $shippingStates = $this->addressServices->getStatesByCountry($shippingAddress->city->state->country->id);
            $shippingCities = $this->addressServices->getCitiesByState($shippingAddress->city->state->id);
            $shippingAsBilling = $shippingAddress->is_billing_shipping;
        }else{
            $shippingStates = [];
            $shippingCities = [];
            $shippingAsBilling = false;
        }

        if(!is_null($billingAddress) && !$shippingAddress->is_billing_shipping){
            if(!is_null($billingAddress->city)){
                $billingStates = $this->addressServices->getStatesByCountry($billingAddress->city->state->country->id);
                $billingCities = $this->addressServices->getCitiesByState($billingAddress->city->state->id);
            }else{
                $billingStates = [];
                $billingCities = [];
            }
        }else{
            $billingStates = [];
            $billingCities = [];
        }

        return ['user' => $user, 'shippingAddress' => $shippingAddress, 'billingAddress' => $billingAddress,
            'countries' => $countries, 'shippingStates' => $shippingStates, 'shippingCities' => $shippingCities,
            'billingStates' => $billingStates, 'billingCities' => $billingCities, 'shippingAsBilling' =>
                $shippingAsBilling, 'emailPreference' => $user->email_preference];
    }

    public function doAccountSettings($request){
        $response = $this->userRepo->updateProfile($request);
        if($request->is_billing_shipping){
            $this->addressServices->updateShippingAddress($request);
        }else{
            $this->addressServices->updateShippingAddress($request);
            $this->addressServices->updateBillingAddress($request);
        }
        return $response;
    }
}
