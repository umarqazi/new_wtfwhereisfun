<?php

namespace App\Http\Controllers;

use App\UserVerification;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Http\Requests\AccountSetting;
use Illuminate\Support\Facades\Mail;
use Alert;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\Mail\VerifyMail;
use App\Services\UserProfileService;
use App\Services\UserServices;
use App\Services\UserContactService;
use App\Services\UserAddressService;
use App\Services\UserEmailPreferenceService;
use App\Services\UserPasswordService;
use App\Services\UserImageService;
use App\Services\ImageService;
use App\Http\Requests\RegisterUser;
use App\Http\Requests\UserProfile;
use App\Http\Requests\UserContact;
use App\Http\Requests\UserAddress;
use App\Http\Requests\UserOtherInformation;
use App\Http\Requests\ChangePassword;
use Illuminate\Http\File;

class UsersController extends Controller
{
    protected $userServices;
    protected $userProfileService;
    protected $userAddressService;
    protected $userContactService;
    protected $userPasswordService;
    protected $userEmailPreferenceService;
    protected $userImageService;
    protected $imageService;

    public function __construct()
    {
        $this->userServices               = new UserServices();
        $this->userProfileService         = new UserProfileService();
        $this->userContactService         = new UserContactService();
        $this->userAddressService         = new UserAddressService();
        $this->userEmailPreferenceService = new UserEmailPreferenceService();
        $this->userPasswordService        = new UserPasswordService();
        $this->userImageService           = new UserImageService();
        $this->imageService               = new ImageService();
    }

    /**
     * Show the application's vendor dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendorDashboard()
    {
        $user = Auth::user();
        return view('users.vendors.dashboard')->with('user', $user);
    }

    /**
     * Show the application's vendor dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(UserProfile $request)
    {
        $response = $this->userProfileService->updateProfile($request);
        return response()->json([
            'type'      =>      'success',
            'msg'       =>      Config::get('constants.USERUPDATE_SUCCESS'),
            'data'      =>      $response
        ]);
    }

    /**
     * Show the application's vendor dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUpdate(UserContact $request)
    {
        $response = $this->userContactService->updateContact($request);
        return response()->json([
            'type'      =>      'success',
            'msg'       =>      Config::get('constants.CONTACTINFO_SUCCESS'),
            'data'      =>      $response
        ]);
    }

    /**
     * Show the application's vendor dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addressUpdate(UserAddress $request)
    {
        $response = $this->userAddressService->updateAddress($request);
        return response()->json([
            'type'      =>      'success',
            'msg'       =>      Config::get('constants.CONTACTINFO_SUCCESS'),
            'data'      =>      $response
        ]);
    }

    /**
     * Show the application's vendor dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function emailPreferenceUpdate(Request $request)
    {
        $response = $this->userEmailPreferenceService->updateEmailPreference($request);
        return response()->json([
            'type'      =>      'success',
            'msg'       =>      Config::get('constants.CONTACTINFO_SUCCESS'),
            'data'      =>      $response
        ]);
    }

    /**
     * Show the application's vendor dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function passwordUpdate(ChangePassword $request)
    {
        $response = $this->userPasswordService->updatePassword($request);
        if($response == 'error'){
            return response()->json([
                'type'      =>      'error',
                'msg'       =>      Config::get('constants.PASSWORD_FAIL'),
                'data'      =>      $response
            ]);
        }else{
            return response()->json([
                'type'      =>      'success',
                'msg'       =>      Config::get('constants.PASSWORD_SUCCESS'),
                'data'      =>      $response
            ]);
        }
    }

    /**
     * Show the application's vendor dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function otherInformationUpdate(UserOtherInformation $request)
    {
        $response = $this->userProfileService->updateOtherInformation($request);
        return response()->json([
            'type'      =>      'success',
            'msg'       =>      Config::get('constants.PROFILEINFO_SUCCESS'),
            'data'      =>      $request->all()
        ]);
    }

    public function userCount(){
        $countUsers = $this->userServices->countUsers();
        return view('admin::dashboard.blocks',
            [
                'value'      => $countUsers,
                'label'      => 'Users',
                'url'        => '#url',
                'urlLabel'   => 'All Users'
            ]
        );
    }

    /**
     * Upload an Image.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadImage(Request $request)
    {
        $response = $this->userImageService->uploadImage($request, 'vendors', Auth::user()->id);
        return response()->json([
            'type'      =>      'success',
            'msg'       =>      Config::get('constants.PROFILEINFO_SUCCESS'),
            'data'      =>      $response
        ]);
    }

    /**
     * Remove an Image.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeImage(Request $request)
    {
        $this->imageService->deleteImage('vendors', $request->user_id);
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $response = $this->userServices->accountSettings();
        return view('users.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $user = User::find($id);
        $user->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the user!');
        return back();
    }
}

