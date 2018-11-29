<?php

namespace App\Repositories;

use App\User;
use App\UserEmailPreference;
use Illuminate\Support\Facades\Auth;
class UserRepo
{
    /**
     * @var User
     */
    private $userModel;

    /**
     * UserRepo constructor.
     */
    public function __construct()
    {
        $userModel = new User();
        $this->userModel = $userModel;
    }

    public function getByEmail($email){
        $user = $this->userModel->where('email', $email)->first();
        return $user;
    }

    public function updateProfile($request){
        $user = Auth::user();

        $user->first_name       =       $request->first_name;
        $user->last_name        =       $request->last_name;
        $user->prefix           =       $request->prefix;
        $user->suffix           =       $request->suffix;
        $user->job_title        =       $request->job_title;
        $user->company          =       $request->company;

        $user->save();
        return $user;
    }

    public function updateContact($request){
        $user = Auth::user();

        $user->mobile          =       $request->mobile;
        $user->phone           =       $request->phone;
        $user->website         =       $request->website;
        $user->blog            =       $request->blog;

        $user->save();
        return $user;
    }

    public function updateOtherInformation($request){
        $user = Auth::user();

        $user->gender           =       $request->gender;
        $user->birth_month      =       $request->birth_month;
        $user->birth_date       =       $request->birth_date;
        $user->birth_year       =       $request->birth_year;
        $user->age              =       $request->age;

        $user->save();
        return $user;
    }

    public function updateEmailPreference($request){
        $user = Auth::user();
        if(!is_null($user->email_preference)){
            $emailPreference = $user->email_preference;
        }else{
            $emailPreference =  new UserEmailPreference;
            $emailPreference->user_id   =   $user->id;
        }
        if($user->hasRole('vendor')){
            $emailPreference->update_new_feature               =       $request->update_new_feature;
            $emailPreference->weekly_event_guide               =       $request->weekly_event_guide;
            $emailPreference->additional_info                  =       $request->additional_info;
            $emailPreference->updates_for_attendees            =       $request->updates_for_attendees;
            $emailPreference->buy_ticket                       =       $request->buy_ticket;
        }

        $emailPreference->organizing_update_new_feature    =       $request->organizing_update_new_feature;
        $emailPreference->event_sales_recap                =       $request->event_sales_recap;
        $emailPreference->updates_for_event_organizers     =       $request->updates_for_event_organizers;
        $emailPreference->updates_for_event_attendees      =       $request->updates_for_event_attendees;
        $emailPreference->important_reminders              =       $request->important_reminders;
        $emailPreference->order_confirmation               =       $request->order_confirmation;

        $emailPreference->save();
        return $emailPreference;
    }

    public function updatePassword($request){
        $user = Auth::user();
        $user->password     =   bcrypt($request->password);
        $user->save();
        return $user;
    }

    public function updatePaymentInfo($request){
        $user = Auth::user();
        $user->payment_method     =   $request->payment_method;
        $user->payment_email      =   $request->payment_email;
        $user->save();
        return $user;
    }

    public function deleteImage($id){
        $user = $this->userModel->where('id', $id)->first();
        $this->userModel->where('id', $id)->update(['profile_thumbnail' => '']);
        return $user->profile_thumbnail;
    }

    public function updateProfileImage($file, $id){
        $this->userModel->where('id', $id)->update(['profile_thumbnail' => $file]);
    }
}




