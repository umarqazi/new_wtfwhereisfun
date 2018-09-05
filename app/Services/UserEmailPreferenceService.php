<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 8/31/18
 * Time: 1:02 PM
 */

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Role;
use App\Repositories\UserRepo;
class UserEmailPreferenceService
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo){
        $this->userRepo = $userRepo;
    }

    public function updateEmailPreference($request){
        return $this->userRepo->updateEmailPreference($request);
    }
}