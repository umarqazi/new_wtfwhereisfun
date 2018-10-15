<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Role;
use App\Repositories\UserRepo;
class UserProfileService
{
    protected $userRepo;

    public function __construct(){
        $this->userRepo = new UserRepo();
    }

    public function updateProfile($request){
        $response = $this->userRepo->updateProfile($request);
        return $response;
    }

    public function updateOtherInformation($request){
        $response = $this->userRepo->updateOtherInformation($request);
        return $response;
    }

}