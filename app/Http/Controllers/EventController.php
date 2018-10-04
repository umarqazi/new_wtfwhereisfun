<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventLayout;
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
use Illuminate\Support\Facades\URL;
use App\Services\Events\EventService;
use App\Services\RefundPolicyService;
use App\Services\Events\EventTopicService;
use App\Services\Events\EventTypeService;
use App\Services\Events\EventSubTopicService;
use App\Services\Events\EventDetailService;
use App\Services\Events\EventTimeLocationService;
use App\Services\Events\EventTicketService;
use App\Services\Events\EventListingService;
use App\Services\Events\EventLayoutService;
use App\Services\CurrencyService;
use App\Services\TimeZoneService;
use App\Services\CategoryServices;
use App\Services\Organizers\OrganizerService;
use App\Http\Requests\Event;
use App\Http\Requests\EventTicket;
use App\Http\Requests\EventTimeLocation;
class EventController extends Controller
{
    protected $eventService;
    protected $refundPolicyService;
    protected $eventTopicService;
    protected $eventTypeService;
    protected $categoryServices;
    protected $eventSubTopicService;
    protected $eventDetailService;
    protected $eventLocationService;
    protected $currencyService;
    protected $timeZoneService;
    protected $eventTicketService;
    protected $eventListingService;
    protected $eventLayoutService;
    protected $organizerService;

    public function __construct()
    {
        $this->eventService             = new EventService();
        $this->refundPolicyService      = new RefundPolicyService();
        $this->eventTopicService        = new EventTopicService();
        $this->eventTypeService         = new EventTypeService();
        $this->categoryServices         = new CategoryServices();
        $this->eventSubTopicService     = new EventSubTopicService();
        $this->eventDetailService       = new EventDetailService();
        $this->eventLocationService     = new EventTimeLocationService();
        $this->currencyService          = new CurrencyService();
        $this->timeZoneService          = new TimeZoneService();
        $this->eventTicketService       = new EventTicketService();
        $this->eventListingService      = new EventListingService();
        $this->eventLayoutService       = new EventLayoutService();
        $this->organizerService         = new OrganizerService();
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
        $refundPolicies = $this->refundPolicyService->getAll();
        $organizers     = $this->organizerService->getUserOrganizers();
        return view('events.create')->with(['refundPolicies' => $refundPolicies, 'organizers' => $organizers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $this->eventService->create($request);
        $response['encoded_id'] = encrypt_id($response['id']);
        return response()->json([
            'type'  =>  'success',
            'msg'   =>  Config::get('constants.EVENTCREATED_SUCCESS'),
            'data'  =>  $response
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
        $response = $this->eventService->show($id);
        return view('events.layouts.'.$response['layout'])->with($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = $this->eventService->edit($id);
        return view('events.edit')->with($response);
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

    public function getTopicSubTopics(Request $request){
        $type = 'ajax';
        $eventSubTopics = $this->eventSubTopicService->getTopicSubTopics($request->event_topic, $type);
        return $eventSubTopics;
    }

    public function detailsUpdate(Event $request){
        $eventId = decrypt_id($request->event_id);
        $response = $this->eventDetailService->updateDetails($request, $eventId);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Details has been Updated Successfully',
            'data'      =>  $response
        ]);
    }

    public function topicsUpdate(Request $request){
        $eventId = decrypt_id($request->event_id);
        $response = $this->eventTopicService->updateTopics($request, $eventId);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Topic Details has been Updated Successfully',
            'data'      =>  $response
        ]);
    }

    public function timeLocationUpdate(EventTimeLocation $request){
        $eventId = decrypt_id($request->event_id);
        $response = $this->eventLocationService->updateTimeLocation($request, $eventId);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Locations has been updated Successfully',
            'data'      =>  $response
        ]);
    }

    public function searchLocation(Request $request){
        $response = $this->eventLocationService->searchLocation($request);
        return response()->json([
            'status'    => 'success',
            'latitude'  => $response->getLatitude(),
            'longitude' => $response->getLongitude()
        ]);
    }

    public function addNewLocationRow(Request $request){
        $currencies = $this->currencyService->getAll();
        $timeZones = $this->timeZoneService->getAll();
        $response = $this->eventLocationService->addNewLocation($currencies, $timeZones, $request->event_id);
        return response()->json([
            'type'      => 'success',
            'msg'       => '',
            'data'      => $response
        ]);
    }

    public function ticketUpdate(EventTicket $request){
        $eventId = decrypt_id($request->event_id);
        $response = $this->eventTicketService->updateEventTicket($request, $eventId);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Ticket has been updated Successfully',
            'data'      =>  $response
        ]);
    }

    public function addNewTicket(Request $request){
        $response = $this->eventTicketService->addNewTicket($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'New Ticket Added',
            'data'      =>  $response
        ]);
    }

    public function ticketDelete(Request $request){
        $this->eventTicketService->deleteTicket($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Ticket Deleted',
            'data'      =>  ''
        ]);
    }

    public function addNewTicketPass(Request $request){
        $response = $this->eventTicketService->addNewTicketPass($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'New Ticket Pass Added',
            'data'      =>  $response
        ]);
    }

    public function ticketPassUpdate(Request $request){
        $response = $this->eventTicketService->updateEventTicketPass($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Ticket has been updated Successfully',
            'data'      =>  $response
        ]);
    }

    public function ticketPassDelete(Request $request){
        $this->eventTicketService->deleteTicketPass($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Pass Deleted',
            'data'      =>  ''
        ]);
    }

    public function eventLayoutUpdate(Request $request){
        $eventId    = decrypt_id($request->event_id);
        $response   = $this->eventLayoutService->updateEventLayout($request, $eventId);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Layout Updated',
            'data'      =>  $request->all()
        ]);
    }

    public function layout(){
        return view('events/layouts/layout-3');
    }

    public function getMyEvents(){
        $draftEvents = $this->eventListingService->getDraftEvents();
        $liveEvents = $this->eventListingService->getLiveEvents();
        $pastEvents = $this->eventListingService->getPastEvents();
        return view('events.my-events')->with(['draftEvents' => $draftEvents, 'liveEvents' => $liveEvents, 'pastEvents' => $pastEvents]);
    }

}
