<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialLink;
use App\Http\Requests\StoreOrganizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Alert;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\Services\Organizers\OrganizerService;
use App\Services\Organizers\OrganizerSocialLinksService;
use App\Services\Organizers\OrganizerImageService;
use App\Services\ImageService;
class OrganizerController extends Controller
{
    protected $organizerService;
    protected $organizerSocialLinksService;
    protected $organizerImageService;
    protected $imageService;

    public function __construct(){

        $this->organizerService             = new OrganizerService();
        $this->organizerSocialLinksService  = new OrganizerSocialLinksService();
        $this->imageService                 = new ImageService();
        $this->organizerImageService        = new OrganizerImageService();
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
        $userOrganizers = $this->organizerService->getUserOrganizers();
        return view('users.organizers.create')->with('userOrganizers', $userOrganizers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizer $request)
    {
        $response = $this->organizerService->create($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  Config::get('constants.ORGANIZERPROFILE_SUCCESS'),
            'data'      =>  $response
        ]);
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
    public function edit($id)
    {
        $decryptId = decrypt_id($id);
        $organizer = $this->organizerService->getOrganizer($decryptId);
        $userOrganizers = $this->organizerService->getUserOrganizers();
        return view('users.organizers.edit')->with(['organizer' => $organizer, 'userOrganizers' => $userOrganizers, 'organizerId' => $id, 'directory' => getDirectory('organizers', $organizer->id)]);
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
        //
    }

    /**
     * Update Organizer Profile.
     *
     * @param  \Illuminate\Http\StoreOrganizer  $request
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(StoreOrganizer $request){
        $organizerId = decrypt_id($request->organizer_id);
        $response = $this->organizerService->profileUpdate($request, $organizerId);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  Config::get('constants.ORGANIZERUPDATE_SUCCESS'),
            'data'      =>  $response
        ]);
    }

    /**
     * Update Organizer's Social Links
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function socialLinksUpdate(SocialLink $request){
        $organizerId = decrypt_id($request->organizer_id);
        $response = $this->organizerSocialLinksService->socialLinksUpdate($request, $organizerId);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  Config::get('constants.ORGANIZERLINKS_SUCCESS'),
            'data'      =>  $response
        ]);
    }

    /**
     * Update Organizer's Profile Color
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileColorsUpdate(StoreOrganizer $request){
        $organizerId = decrypt_id($request->organizer_id);
        $response = $this->organizerService->profileColorsUpdate($request, $organizerId);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  Config::get('constants.ORGANIZERCOLORS_SUCCESS'),
            'data'      =>  $response
        ]);
    }

    /**
     * Upload Organizer Profile Image
     */
    public function uploadImage(Request $request){
        $response = $this->organizerImageService->uploadImage($request, 'organizers', $request->id);
        return response()->json([
            'type'      =>      'success',
            'msg'       =>      Config::get('constants.PROFILEINFO_SUCCESS'),
            'data'      =>      $response
        ]);
    }

    /**
     * Remove Organizers Profile Image
     */
    public function removeImage(Request $request)
    {
        $this->imageService->deleteImage('organizers', $request->organizer_id);
        return back();
    }

    public function organizerProfile($slug){
        $organizer         = $this->organizerService->getOrganizerBySlug($slug);
        $eventLocations    = $this->organizerService->getOrganizerEvents($organizer->id);
        return view('users.organizers.profile')->with(['organizer' => $organizer, 'eventLocations' => $eventLocations, 'organizerDirectory' => getDirectory('organizers', $organizer->id)]);
    }

    public function changeOrganizerUrl(Request $request){

        $organizer_detail = $this->organizerService->getOrganizer($request->id);
        $organizer = $this->organizerService->updateOrganizerUrl($organizer_detail,$request);

        return response()->json([
            'organizer_url' => $organizer['organizer_url'],
            'slug' => $organizer['slug'],
        ]);
    }
}
