<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepo;
use Illuminate\Support\Facades\Auth;
class UserPasswordService
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo){
        $this->userRepo = $userRepo;
    }

    public function updatePassword($request){
        $currentPassword    =    $request->current_password;
        if(Hash::check($currentPassword, Auth::user()->password)){
            return $this->userRepo->updatePassword($request);
        }else{
            return 'error';
        }
    }

}