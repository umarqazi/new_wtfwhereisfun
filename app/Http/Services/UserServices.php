<?php

namespace App\Http\Services;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserServices
{
    public function countUsers(){
        return User::all()->count();
    }
}
