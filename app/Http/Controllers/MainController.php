<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Validator;
use Alert;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPassword;
use App\ResetPassword;
use Illuminate\Support\Facades\Config;
use App\Services\UserServices;
use App\Services\BlogService;
use App\Services\CategoryService;
use App\Services\TestimonialService;
use App\Services\ContentService;
use App\Services\Events\EventListingService;
use App\Services\Events\EventTimeLocationService;
use App\Services\Events\EventFilterService;
use Illuminate\Http\Response;
use App\UserVerification;
use App\Http\Requests\RegisterUser;
use Illuminate\Support\Facades\Hash;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Traits\HasRoles;
class MainController extends Controller
{
    use HasRoles;
    protected $userServices;
    protected $blogServices;
    protected $testimonialServices;
    protected $categoryServices;
    protected $contentService;
    protected $eventListingService;
    protected $eventLocationService;
    protected $eventFilterService;

    public function __construct()
    {
        $this->userServices         = new UserServices;
        $this->blogServices         = new BlogService;
        $this->testimonialServices  = new TestimonialService;
        $this->categoryServices     = new CategoryService;
        $this->contentService       = new ContentService;
        $this->eventListingService  = new EventListingService;
        $this->eventLocationService = new EventTimeLocationService;
        $this->eventFilterService   = new EventFilterService;
    }
    /**
     * Show the application's landing Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user           = Auth::user();
        $blogs          = $this->blogServices->getAll();
        $testimonials   = $this->testimonialServices->getAll();
        $categories     = $this->categoryServices->getAll();
        $todayEvents    = $this->eventListingService->getTodayEventsByTimeAndLocation();
        $futureEvents   = $this->eventListingService->getFutureEventsByTimeAndLocation();
        $location       = $this->eventLocationService->getUserLocation();
        $loadLocations  = $this->eventLocationService->getTodayEventsMapMarkers($todayEvents, $location['lat'], $location['lng']);
        return view('front-end.public.landing-page')->with(['blogs' => $blogs, 'categories' => $categories, 'testimonials'
            => $testimonials, 'user' => $user, 'todayEvents' => $todayEvents, 'futureEvents' => $futureEvents,
            'categoriesPath' => getDirectory('categories'), 'testimonialsPath' => getDirectory('testimonials'),
            'map' => $loadLocations, 'city' => $location['city']]);
    }

    /**
     * Show the search results
     *
     * @return \Illuminate\Http\Response
     */
    public function searchEvents(Request $request)
    {
        $response = $this->eventFilterService->searchEvents($request->all());
        if ($request->has('type')){
            return response()->json([
                'type' => 'success',
                'msg'  =>    '',
                'data' => ['searchResults' => $response['results'], 'count' => $response['count']]
            ]);
        }else{
            return View('front-end.events.events-search')->with(['locationEvents' => $response['results'], 'count' => $response['count'] ]);
        }
    }

    /**
     * Application registration process.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterUser $request)
    {
        $registeredUser = $this->userServices->register($request);
        if (!is_null($registeredUser)){
            return response()->json([
                'type' => 'success',
                'msg' => Config::get('constants.REG_SUCCESS'),
                'data' => $registeredUser
            ]);
        }else{
            return response()->json([
                'type' => 'error',
                'msg' => Config::get('constants.GENERAL_ERROR'),
            ]);
        }
    }

    /**
     * User verification process from email.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyUser($token)
    {
        $response = $this->userServices->verifyUser($token);
        if($response == 'success'){
            Alert::success(Config::get('constants.VERIFIED_SUCCESS'), 'Success')->autoclose(3000);
            return Redirect::to('/');
        }else if($response == 'already-verified'){
            Alert::message(Config::get('constants.ALREADY_VERIFIED'), 'Already Verified')->autoclose(3000);
            return Redirect::to('/');
        }else{
            Alert::error(Config::get('constants.GENERAL_ERROR'), 'Error')->autoclose(3000);
            return Redirect::to('/');
        }
    }

    /**
     * User login process.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $response = $this->userServices->login($request);
        if($response == 'incorrect-password'){
            return response()->json([
                'type'  => 'failed',
                'msg'   => Config::get('constants.INCORRECT_PASS')
            ]);
        }else if($response == 'not-verified'){
            return response()->json([
                'type'  => 'failed',
                'msg'   => Config::get('constants.USER_VERIFICATION')
            ]);
        }else if($response == 'blocked'){
            return response()->json([
                'type'  => 'failed',
                'msg'   => Config::get('constants.BLOCK_USER_MSG')
            ]);
        }else if($response == 'deactivated'){
            return response()->json([
                'type'  => 'failed',
                'msg'   => Config::get('constants.DEACTIVATE_USER')
            ]);
        }else if($response == 'invalid-user'){
            return response()->json([
                'type'  => 'failed',
                'msg'   => Config::get('constants.AUTH_FAILED')
            ]);
        }else{
            return response()->json([
                'type'  => 'success',
                'msg'   => Config::get('constants.AUTH_SUCCESS'),
                'data'  => $response
            ]);
        }

    }

    /**
     * Logout Method
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Show forget password form.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgetPassword()
    {
        return view('front-end.public.forget-password');
    }

    /**
     * Forget password process.
     *
     * @return \Illuminate\Http\Response
     */
    public function doForgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);
        if($validator->fails()) {
            Alert::error($validator->errors()->first(), 'Error')->autoclose(3000);
            return Redirect::back();
        }

        $response = $this->userServices->forgetPassword($request);

        if($response == 'already-forget'){
            Alert::error(Config::get('constants.FORGET_ALREADY', 'Error'))->autoclose(3000);
            return Redirect::back();
        }else if($response == 'verify-first'){
            Alert::error(Config::get('constants.FORGET_VERIFY', 'Error'))->autoclose(3000);
            return Redirect::back();
        }else if($response == 'social-signup'){
            Alert::error(Config::get('constants.FORGET_SOCIAL', 'Error'))->autoclose(3000);
            return Redirect::back();
        }else if($response == 'blocked'){
            Alert::error(Config::get('constants.FORGET_BLOCKED', 'Error'))->autoclose(3000);
            return Redirect::back();
        }else if($response == 'success'){
            Alert::success(Config::get('constants.FORGET_SUCCESS', 'Success'))->autoclose(3000);
            return Redirect::to('/');
        }else{
            Alert::error(Config::get('constants.GENERAL_ERROR', 'Error'))->autoclose(3000);
            return Redirect::to('/');
        }
    }

    /**
     * Show reset password form.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPassword($token){
        $reset_password = ResetPassword::where('token', $token)->first();
        if(is_null($reset_password)){
            Alert::error(Config::get('constants.ALREADY_CHANGED', 'Error'))->autoclose(3000);
            return Redirect::to('/');
        }else{
            return view('front-end.public.reset-password')->with('reset_password', $reset_password);
        }
    }

    /**
     * Reset password process.
     *
     * @return \Illuminate\Http\Response
     */
    public function doResetPassword(Request $request){
        $validator = Validator::make($request->all(),
            ['password'      => 'required|confirmed|string|max:14|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/'],
            ['password.regex' => 'Password must contain at least 6 characters, including UPPER/lower case & numbers, at-least one special character']);
        if($validator->fails()) {
            Alert::error($validator->errors()->first(), 'Error')->autoclose(3000);
            return Redirect::back();
        }else{
            $response = $this->userServices->resetPassword($request);
            if($response == 'error'){
                Alert::error(Config::get('constants.GENERAL_ERROR', 'Error'))->autoclose(3000);
                return Redirect::to('/');
            }else{
                Alert::success(Config::get('constants.PASSWORD_SUCCESS', 'Success'))->autoclose(3000);
                return Redirect::to('/');
            }
        }
    }

    public function aboutUs(){
        $content = $this->contentService->getContent($type = 'ABOUT_US');
        return view('front-end.public.about-us')->with('content', $content);
    }

    public function termsCondition(){
        $content = $this->contentService->getContent($type = 'TERMS_CONDITIONS');
        return view('front-end.public.terms-conditions')->with('content', $content);
    }

    public function privacyPolicy(){
        $content = $this->contentService->getContent($type = 'PRIVACY_POLICY');
        return view('front-end.public.privacy-policy')->with('content', $content);
    }

    public function contactUs(){
        return view('front-end.public.contact-us');
    }
}
