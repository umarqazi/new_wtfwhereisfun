<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 8/30/18
 * Time: 9:01 PM
 */

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Role;
use App\Repositories\UserRepo;
class UserContactService
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo){
        $this->userRepo = $userRepo;
    }

    public function updateContact($request){
        $response = $this->userRepo->updateContact($request);
        return $response;
    }

}