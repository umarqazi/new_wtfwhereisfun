<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Http\Requests\EventLayout;
use App\Http\Requests\EventTopic;
use App\Http\Requests\GuestList;
use App\Http\Requests\WaitListSetting;
use App\Http\Requests\WaitListSignUpForm;
use App\Services\Events\EventAnalyticService;
use App\Services\Events\EventCalendarService;
use App\Services\Events\EventOrderService;
use App\Services\Events\EventRevenueService;
use App\Services\Events\TicketDisputeService;
use App\Services\GuestListService;
use App\Services\GuestService;
use App\Services\WaitingListService;
use App\Services\WaitingListSettingsService;
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
use App\Services\Payments\StripeService;
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
use App\Services\Events\EventImageService;
use App\Services\Events\EventHotDealService;
use App\Services\CurrencyService;
use App\Services\TimeZoneService;
use App\Services\CategoryService;
use App\Services\Organizers\OrganizerService;
use App\Http\Requests\Event;
use App\Http\Requests\EventTicket;
use App\Http\Requests\EventTicketPass;
use App\Http\Requests\EventTimeLocation;
use Carbon\Carbon;
use App\Http\Requests\Guest as GuestRequest;

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
    protected $eventImageService;
    protected $eventHotDealService;
    protected $eventOrderService;
    protected $eventCalendarService;
    protected $eventRevenueService;
    protected $disputeService;
    protected $waitingListSettingsService;
    protected $waitingListService;
    protected $stripeService;
    protected $guestListService;
    protected $guestService;
    protected $analyticService;

    public function __construct()
    {
        $this->eventService                 = new EventService();
        $this->refundPolicyService          = new RefundPolicyService();
        $this->eventTopicService            = new EventTopicService();
        $this->eventTypeService             = new EventTypeService();
        $this->categoryServices             = new CategoryService();
        $this->eventSubTopicService         = new EventSubTopicService();
        $this->eventDetailService           = new EventDetailService();
        $this->eventLocationService         = new EventTimeLocationService();
        $this->currencyService              = new CurrencyService();
        $this->timeZoneService              = new TimeZoneService();
        $this->eventTicketService           = new EventTicketService();
        $this->eventListingService          = new EventListingService();
        $this->eventLayoutService           = new EventLayoutService();
        $this->organizerService             = new OrganizerService();
        $this->eventImageService            = new EventImageService();
        $this->eventHotDealService          = new EventHotDealService();
        $this->eventOrderService            = new EventOrderService();
        $this->eventRevenueService          = new EventRevenueService();
        $this->disputeService               = new TicketDisputeService();
        $this->eventCalendarService         = new EventCalendarService();
        $this->waitingListSettingsService   = new WaitingListSettingsService();
        $this->waitingListService           = new WaitingListService();
        $this->guestListService             = new GuestListService();
        $this->guestService                 = new GuestService();
        $this->stripeService                = new StripeService();
        $this->analyticService              = new EventAnalyticService();
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
        $response = $this->eventService->create();
        if(count($response['organizers'])){
            return view('events.create')->with($response);
        }else{
            Alert::error('Please create an Organizer first!', 'Error');
            return redirect('organizers/create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Event $request)
    {
        $response       = $this->eventService->store($request);
        $stripeProduct  = $this->stripeService->createStripeProduct($response->id, 'store');
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
     * @param $id
     * @param $locationId
     * @return $this
     */
    public function show($id, $locationId)
    {
        $response = $this->eventService->show($id, $locationId);
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

    /**
     * Make Event Live And generate
     * notification for admin Approval
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function eventGoLive(Request $request){
        $response = $this->eventService->goLive($request);
        return response()->json([
            'type'      =>  $response['type'],
            'msg'       =>  $response['msg'],
            'data'      =>  $response['data']
        ]);
    }

    /**
     * Get Topic children topics
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTopicSubTopics(Request $request){
        $type = 'ajax';
        $eventSubTopics = $this->eventSubTopicService->getTopicSubTopics($request->event_topic, $type);
        return $eventSubTopics;
    }

    /**
     * Update Event Basic Details
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function detailsUpdate(Event $request){
        $eventId        = decrypt_id($request->event_id);
        $response       = $this->eventDetailService->updateDetails($request, $eventId);
        $stripeProduct  = $this->stripeService->createStripeProduct($response->id, 'edit');
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Details has been Updated Successfully',
            'data'      =>  $response
        ]);
    }

    /**
     * Update Event Topics & Category & Tags
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function topicsUpdate(EventTopic $request){
        $eventId = decrypt_id($request->event_id);
        $response = $this->eventTopicService->updateTopics($request, $eventId);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Topic Details has been Updated Successfully',
            'data'      =>  $response
        ]);
    }

    /**
     * Update Event Time & Locations
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function timeLocationUpdate(EventTimeLocation $request){
        $eventId = decrypt_id($request->event_id);
        $response = $this->eventLocationService->updateTimeLocation($request, $eventId);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Locations has been updated Successfully',
            'data'      =>  $response
        ]);
    }

    /**
     * Search Location
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchLocation(Request $request){
        $response = $this->eventLocationService->searchLocation($request);
        return response()->json([
            'status'    => 'success',
            'latitude'  => $response->getLatitude(),
            'longitude' => $response->getLongitude()
        ]);
    }

    /**
     * Add new Location Row
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNewLocationRow(Request $request){
        $currencies = $this->currencyService->getAll();
        $timeZones = $this->timeZoneService->getAll();
        $response = $this->eventLocationService->addNewLocation($currencies, $timeZones, $request->event_id, $request->element_id);
        return response()->json([
            'type'      => 'success',
            'msg'       => '',
            'data'      => $response
        ]);
    }

    /**
     * Update Event Ticket
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ticketUpdate(EventTicket $request){
        $response   = $this->eventTicketService->updateEventTicket($request, decrypt_id($request->event_id));
        $ticketSku  = $this->stripeService->createStripeSku($response->id, $request->request_type);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Ticket has been updated Successfully',
            'data'      =>  $response
        ]);
    }

    /**
     * Add new Event Ticket
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNewTicket(Request $request){
        $locations = $this->eventLocationService->getEventLocations(decrypt_id($request->event_id));
        $response  = $this->eventTicketService->addNewTicket($request, $locations);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'New Ticket Added',
            'data'      =>  $response
        ]);
    }

    /**
     * Delete Event Ticket
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ticketDelete(Request $request){
        $this->eventTicketService->deleteTicket($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Ticket Deleted',
            'data'      =>  ''
        ]);
    }

    /**
     * Add New Ticket Pass
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNewTicketPass(Request $request){
        $response = $this->eventTicketService->addNewTicketPass($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'New Ticket Pass Added',
            'data'      =>  $response
        ]);
    }

    /**
     * Update Event Ticket Pass
     *
     * @param  \Illuminate\Http\EventTicketPass  $request
     * @return \Illuminate\Http\Response
     */
    public function ticketPassUpdate(EventTicketPass $request){
        $response = $this->eventTicketService->updateEventTicketPass($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Ticket has been updated Successfully',
            'data'      =>  $response
        ]);
    }

    /**
     * Delete Event Ticket Pass
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ticketPassDelete(Request $request){
        $this->eventTicketService->deleteTicketPass($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Pass Deleted',
            'data'      =>  ''
        ]);
    }

    /**
     * Update Event Layout
     *
     * @param  \Illuminate\Http\EventLayout  $request
     * @return \Illuminate\Http\Response
     */
    public function eventLayoutUpdate(EventLayout $request){
        $response   = $this->eventLayoutService->updateEventLayout($request);
        $response   = $this->eventLayoutService->updateEventLayout($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Layout Updated',
            'data'      =>  $response
        ]);
    }

    /**
     * Add New Event Image
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNewImage(Request $request){
        $response   = $this->eventImageService->addNewImage($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  '',
            'data'      =>  $response
        ]);
    }

    /**
     * Update Event Image
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadEventImage(Request $request){
        $response   = $this->eventImageService->uploadImage($request, 'events', decrypt_id($request->event_id), 'gallery');
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Event Layout Updated',
            'data'      =>  $response
        ]);
    }

    /**
     * Delete Event Image
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeEventImage(Request $request){
        $response = $this->eventImageService->removeImage($request->id);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Image Deleted Successfully',
            'data'      =>  $response
        ]);
    }

    /**
     * Get Vendor Events
     *
     * @return \Illuminate\Http\Response
     */
    public function getMyEvents(){
        $vendorId       = Auth::user()->id;
        $liveEvents     = $this->eventListingService->getTodayEventsByTimeAndLocation($vendorId);
        $pastEvents     = $this->eventListingService->getPastEventsByTimeAndLocation($vendorId);
        $draftEvents    = $this->eventListingService->getDraftEventsByTimeAndLocation($vendorId);
        $allEvents      = $this->eventListingService->getAllEventsByTimeAndLocation($vendorId);
        return view('events.vendor-listing')->with(['draftEventLocations' => $draftEvents, 'liveEventLocations' => $liveEvents, 'pastEventLocations' => $pastEvents, 'allEventLocations' => $allEvents]);
    }

    /**
     * Get All Live Events
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllLiveEvents(){
        $liveEvents = $this->eventListingService->getLiveEvents();
        return view('front-end.events.index')->with('liveEvents', $liveEvents);
    }

    /**
     * Get Today's Events
     *
     * @return \Illuminate\Http\Response
     */
    public function getTodaysEvents(){
        $locationEvents = $this->eventListingService->getTodayEventsByTimeAndLocation();
        return view('front-end.events.index')->with('locationEvents', $locationEvents);
    }

    /**
     * Get Future Events
     *
     * @return \Illuminate\Http\Response
     */
    public function getFutureEvents(){
        $locationEvents = $this->eventListingService->getFutureEventsByTimeAndLocation();
        return view('front-end.events.index')->with('locationEvents', $locationEvents);
    }

    /**
     * Make Event Hot Deal
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function makeHotDeal(Request $request){
        $response = $this->eventHotDealService->makeHotDeal($request);
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Hot Deal Created Successfully',
            'data'      =>  $response
        ]);

    }

    /**
     * Remove Event Hot Deal
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeHotDeal(Request $request){
        $response = $this->eventHotDealService->removeHotDeal(decrypt_id($request->event_id));
        if($response){

            return response()->json([
                'type'      =>  'success',
                'msg'       =>  'Hot Deal Removed Successfully',
                'data'      =>  ''
            ]);
        }else{
            return response()->json([
                'type'      =>  'error',
                'msg'       =>  'Could not remove the Hot Deal. Please try again!',
                'data'      =>  ''
            ]);
        }
    }

    /**
     * Remove Get All Hot Deals
     */
    public function getHotDealEvents(){
        $hotDealEvents = $this->eventListingService->getHotDealEvents();
        return view('front-end.events.hot-deals')->with('hotDeals', $hotDealEvents);
    }

    /**
     * Get Event Time's Location
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTimeLocation(Request $request){
        $response = $this->eventLocationService->getTimeLocation(decrypt_id($request->location_id));
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  '',
            'data'      =>  $response
        ]);
    }

    /**
     * Get Event's Dashboard
     * @param  \Illuminate\Http\ $id
     */
    public function dashboard($locationId){
        $locationId     = decrypt_id($locationId);
        $event          = $this->eventLocationService->getLocationEvent($locationId);
        $location       = $this->eventLocationService->getTimeLocation($locationId);
        $totalRevenue   = $this->eventRevenueService->getTotalRevenueByLocation($locationId);
        $weekRevenue    = $this->eventRevenueService->getWeekRevenueByLocation($locationId);
        $monthRevenue   = $this->eventRevenueService->getMonthRevenueByLocation($locationId);
        $analytics      = $this->analyticService->getEventAnalytics($locationId);
        $orderIds       = $totalRevenue['orders']->pluck('id')->toArray();
        $disputes       = $this->disputeService->getByOrderId($orderIds);
        $eventOrganizer = $event->organizer;
        return View('events.dashboard')->with(['event' => $event, 'location' => $location, 'totalRevenue' => $totalRevenue,
            'weekRevenue' => $weekRevenue, 'monthRevenue' => $monthRevenue, 'disputes' => $disputes, 'activity' => $totalRevenue['orders'], 'eventOrganizer' => $eventOrganizer ]);
    }

    /**
     * Get Events Dashboard's Orders
     * @param $locationId
     * @return $this
     */
    public function dashboardOrders($locationId){
        $locationId         = decrypt_id($locationId);
        $event              = $this->eventLocationService->getLocationEvent($locationId);
        $location           = $this->eventLocationService->getTimeLocation($locationId);
        $completedOrders    = $this->eventRevenueService->getTotalRevenueByLocation($locationId);
        $allOrders          = $this->eventRevenueService->getAllOrdersByLocation($locationId);
        return View('events.dashboard-orders')->with(['event' => $event, 'location' => $location,
            'completedOrders' => $completedOrders, 'allOrders' => $allOrders]);
    }


    /**
     * Get Events Dashboard's Wait List Settings
     * @param $locationId
     * @return $this
     */
    public function dashboardWaitListSettings($locationId){
        $locationId     = decrypt_id($locationId);
        $event          = $this->eventLocationService->getLocationEvent($locationId);
        $location       = $this->eventLocationService->getTimeLocation($locationId);
        $data           = [
            'event_id' => $event->id,
            'event_time_location_id' => $location->id,
        ];
        $waitList       = $this->waitingListSettingsService->fetch($data);
        return View('events.dashboard-wait-list-settings')->with(['event' => $event, 'location' => $location, 'waitList' => $waitList]);
    }

    /**
     * @param WaitListSetting $request
     * @return $this
     */
    public function saveWaitListSettings(WaitListSetting $request){
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        unset($data['waitlist_check']);
        if (!array_key_exists('collect_phn', $data)) {
            $data['collect_phn'] = 0;
        }
        $data1['event_time_location_id'] = $data['event_time_location_id'];
        $data1['event_id'] = $data['event_id'];
        unset($data['event_time_location_id']);
        unset($data['event_id']);

        $locationId = $request->event_time_location_id;
        $waitList   = $this->waitingListSettingsService->updateORCreateWaitingListSetting($data1, $data);
        $event      = $this->eventLocationService->getLocationEvent($locationId);
        $location   = $this->eventLocationService->getTimeLocation($locationId);
        return View('events.dashboard-wait-list-settings')->with(['event' => $event, 'location' => $location, 'waitList' => $waitList]);
    }

    public function calendar(){
        $calendar = $this->eventCalendarService->getVendorEventsCalendar(Auth::user()->id);
        return View('events.calendar', compact('calendar'));
    }

    /*
     * Update Event Url
     * \Illuminate\Http\ Request $request
     */
    public function updateEventUrl(Request $request){
        $response = $this->eventService->updateEventUrl(decrypt_id($request->id), $request->all());
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Your Event Link has been updated Successfully!',
            'data'      =>  url('/').'/events/'.$request->url.'-'.$request->id.'/'.$request->locationId
        ]);
    }

    /**
     * @param $locationId
     * @return $this
     */
    public function waitList($locationId)
    {
        $locationId     = decrypt_id($locationId);
        $event          = $this->eventLocationService->getLocationEvent($locationId);
        $location       = $this->eventLocationService->getTimeLocation($locationId);
        $data           = [
            'event_id'                  => $event->id,
            'event_time_location_id'    => $location->id,
        ];
        $waitList       = $this->waitingListSettingsService->fetch($data);
        $waitListing    = $this->waitingListService->fetch($data);
        return View('events.dashboard-wait-list')->with(['event' => $event, 'location' => $location, 'waitList' => $waitList, 'waitListing' => $waitListing]);
    }

    /**
     * @param WaitListSignUpForm $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function signUpForWaiting(WaitListSignUpForm $request){
        $waiting_record = $this->waitingListService->create($request->all());
        Alert('Request added to Waiting List!','success');
        return redirect()->back();
    }

    public function guestLists($locationId){
        $locationId = decrypt_id($locationId);
        $data =[
            'event_time_locations_id' => $locationId,
        ];
        $event          = $this->eventLocationService->getLocationEvent($locationId);
        $location       = $this->eventLocationService->getTimeLocation($locationId);
        $guestListing   = $this->guestListService->fetch($data);
        return View('events.dashboard-guest-list')->with(['event' => $event, 'guestListing' => $guestListing, 'location' => $location]);
    }

    public function guestList($locationId, $guestListId){
        $locationId = decrypt_id($locationId);
        $guestListId = decrypt_id($guestListId);
        $data =[
            'guest_list_id' => $guestListId,
        ];
        $event          = $this->eventLocationService->getLocationEvent($locationId);
        $location       = $this->eventLocationService->getTimeLocation($locationId);
        $tickets        = $this->eventTicketService->getTicketsByLocation($locationId);
        $guests         = $this->guestService->fetch($data);
        return View('events.dashboard-guest')->with(['event' => $event, 'guests' => $guests, 'location' => $location, 'tickets' => $tickets]);
    }

    public function addGuestList($locationId, GuestList $request){
        $locationId = decrypt_id($locationId);
        $data = [
            'name'                      => $request->name,
            'event_time_locations_id'   => $locationId,
        ];
        $this->guestListService->create($data);
        Alert('Guest List added!','success');
        return redirect()->back();
    }

    public function addGuest($locationId, $guestList, GuestRequest $request){
        $data = $request->all();
        $data['guest_list_id'] = decrypt_id($data['guest_list_id']);
        $locationId = decrypt_id($locationId);
        $this->guestService->create($data);
        Alert('Guest added to Guest List!','success');
        return redirect()->back();
    }
}
