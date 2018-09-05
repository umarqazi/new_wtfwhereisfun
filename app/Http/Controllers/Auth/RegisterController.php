<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Role;
use App\Mail\VerifyMail;
use App\UserVerification;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        return response()->json([
            'type'  => 'success',
            'msg'   => Config::get('constants.REG_SUCCESS'),
        ]);
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,
            [
                'first_name'    => 'sometimes|required|string|max:255',
                'last_name'     => 'sometimes|required|string|max:255',
                'email'         => 'required|string|email|max:255|unique:users',
                'username'      => 'sometimes|required',
                'password'      => 'required|string|max:14|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/'
            ],
            [
                'password.regex' => 'Password must contain at least 6 characters, including UPPER/lower case & numbers, at-least one special character'
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User;
        if (array_has($data, 'username')){
            $user->username     =   $data['username'];
            $role               =   'vendor';
        }else{
            $user->first_name   =   $data['first_name'];
            $user->last_name    =   $data['last_name'];
            $role               =   'normal';
        }

        $user->email            =   $data['email'];
        $user->password         =   bcrypt($data['password']);
        $user->save();

        $user_verification = UserVerification::create([
            'user_id'   => $user->id,
            'token'     => str_random(30)
        ]);
        $user->assignRole($role);
        Mail::to($user->email)->send(new VerifyMail($user));
    }
}
