<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'username', 'prefix', 'suffix',
        'user_type', 'phone', 'mobile', 'job_title', 'company', 'website', 'blog', 'dob',
        'age', 'gender', 'is_social_signup', 'social_type', 'social_id', 'profile_picture',
        'profile_thumbnail', 'user_token', 'is_verified', 'is_blocked', 'is_deactivated',
        'last_login', 'account_close_type', 'account_close_reason', 'stripe_user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Get user verification.
     */
    public function verification()
    {
        return $this->hasOne('App\UserVerification');
    }

    /**
     * Get user reset password.
     */
    public function lost_password()
    {
        return $this->hasOne('App\ResetPassword', 'user_id');
    }

    /**
     * Get user email preference
     */
    public function email_preference()
    {
        return $this->hasOne('App\UserEmailPreference');
    }

    /**
     * Get user Shipping Address
     */
    public function shipping_address()
    {
        return $this->hasOne('App\ShippingAddress');
    }

    /**
     * Get user Billing Address
     */
    public function billing_address()
    {
        return $this->hasOne('App\BillingAddress');
    }

    /**
     * Get user Organizers
     */
    public function organizers()
    {
        return $this->hasMany('App\Organizer');
    }

    /**
     * Get user Disputes
     */
    public function disputes()
    {
        return $this->hasMany('App\Dispute');
    }

    /**
     * Get Vendor Events
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
