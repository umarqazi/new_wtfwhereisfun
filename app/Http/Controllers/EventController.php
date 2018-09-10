<?php

namespace App\Http\Controllers;

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
use App\Services\Events\EventService;
use App\Services\RefundPolicyService;
use App\Services\Events\EventTopicService;
use App\Services\Events\EventTypeService;
use App\Services\Events\EventSubTopicService;
use App\Services\Events\EventDetailService;
use App\Services\Events\EventTimeLocationService;
use App\Services\Events\EventTicketService;
use App\Services\CurrencyService;
use App\Services\TimeZoneService;
use App\Services\CategoryServices;
use App\Http\Requests\Event;
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

    public function __construct(EventService $eventService, RefundPolicyService $refundPolicyService,
                                EventTopicService $eventTopicService, EventTypeService $eventTypeService,
                                CategoryServices $categoryServices, EventSubTopicService $eventSubTopicService,
                                EventDetailService $eventDetailService, EventTimeLocationService
                                $eventLocationService, CurrencyService $currencyService, TimeZoneService
                                $timeZoneService, EventTicketService $eventTicketService)
    {
        $this->eventService             = $eventService;
        $this->refundPolicyService      = $refundPolicyService;
        $this->eventTopicService        = $eventTopicService;
        $this->eventTypeService         = $eventTypeService;
        $this->categoryServices         = $categoryServices;
        $this->eventSubTopicService     = $eventSubTopicService;
        $this->eventDetailService       = $eventDetailService;
        $this->eventLocationService     = $eventLocationService;
        $this->currencyService          = $currencyService;
        $this->timeZoneService          = $timeZoneService;
        $this->eventTicketService       = $eventTicketService;
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
        $response = $this->refundPolicyService->getAll();
        return view('events.create')->with('refundPolicies', $response);
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
        $event_id = decrypt_id($id);
        $event = $this->eventService->getByID($event_id);
        $refundPolicies = $this->refundPolicyService->getAll();
        $eventTopics = $this->eventTopicService->getAll();
        $categories = $this->categoryServices->getAll();
        $eventTypes = $this->eventTypeService->getAll();
        $currencies = $this->currencyService->getAll();
        $timeZones = $this->timeZoneService->getAll();
        if(!is_null($event->topic)){
            $eventSubTopics = $this->eventSubTopicService->getTopicSubTopics($event->topic->id);
        }else{
            $eventSubTopics = [];
        }
        $locations = $this->eventLocationService->getEventLocations($event_id);
        $tickets = $this->eventTicketService->getEventTickets($event_id);
        return view('events.edit')->with(['event' => $event, 'refundPolicies' => $refundPolicies, 'eventTopics' =>
            $eventTopics, 'categories' => $categories, 'eventTypes' => $eventTypes, 'eventSubTopics' =>
            $eventSubTopics, 'eventId' => $id, 'locations' => $locations, 'currencies' => $currencies, 'timeZones' =>
        $timeZones, 'tickets' => $tickets]);
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
            'msg'       => 'Haha',
            'data'      => $response
        ]);
    }

    public function ticketUpdate(Request $request){
        $eventId = decrypt_id($request->event_id);
        $response = $this->eventTicketService->updateEventTicket($request, $eventId);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Ticket has been updated Successfully',
            'data'      =>  $response
        ]);
    }

}
