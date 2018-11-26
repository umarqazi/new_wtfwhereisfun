<?php
namespace App\Services\Events;

use App\Repositories\EventRepo;
use Illuminate\Http\Response;
use App\Services\IDBService;
use App\Services\BaseService;
use App\Services\RefundPolicyService;
use App\Services\Events\EventTopicService;
use App\Services\Events\EventTypeService;
use App\Services\Events\EventTagService;
use App\Services\Events\EventSubTopicService;
use App\Services\Events\EventDetailService;
use App\Services\Events\EventTimeLocationService;
use App\Services\Events\EventTicketService;
use App\Services\Events\EventListingService;
use App\Services\Events\EventLayoutService;
use App\Services\CurrencyService;
use App\Services\TimeZoneService;
use App\Services\CategoryService;
use App\Services\Organizers\OrganizerService;
use Alert;
use Illuminate\Support\Facades\Redirect;
use Mapper;
use View;
class EventService extends BaseService implements IDBService
{
    protected $eventRepo;
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
    protected $eventLayoutService;
    protected $organizerService;
    protected $eventTagService;

    public function __construct(){
        $this->refundPolicyService      = new RefundPolicyService();
        $this->eventTopicService        = new EventTopicService();
        $this->eventTypeService         = new EventTypeService();
        $this->eventTagService          = new EventTagService();
        $this->categoryServices         = new CategoryService();
        $this->eventSubTopicService     = new EventSubTopicService();
        $this->eventDetailService       = new EventDetailService();
        $this->eventLocationService     = new EventTimeLocationService();
        $this->currencyService          = new CurrencyService();
        $this->timeZoneService          = new TimeZoneService();
        $this->eventTicketService       = new EventTicketService();
        $this->eventLayoutService       = new EventLayoutService();
        $this->eventRepo                = new EventRepo();
        $this->organizerService         = new OrganizerService();
    }

    public function create($request = null)
    {
        $refundPolicies = $this->refundPolicyService->getAll();
        $organizers     = $this->organizerService->getUserOrganizers();
        return ['refundPolicies' => $refundPolicies, 'organizers' => $organizers];
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function remove($id)
    {
        // TODO: Implement remove() method.
    }

    public function search($request)
    {
        // TODO: Implement search() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getByID($id)
    {
        return $this->eventRepo->getByID($id);
    }

    public function store($request){
        return $this->eventRepo->create($request);
    }

    public function edit($id){
        $event_id       = decrypt_id($id);
        $event          = $this->getByID($event_id);
        $refundPolicies = $this->refundPolicyService->getAll();
        $eventTopics    = $this->eventTopicService->getAll();
        $eventTags      = $this->eventTagService->getEventTags($event_id);
        $categories     = $this->categoryServices->getAll();
        $eventTypes     = $this->eventTypeService->getAll();
        $currencies     = $this->currencyService->getAll();
        $timeZones      = $this->timeZoneService->getAll();
        $layouts        = $this->eventLayoutService->getAll();
        $locations      = $this->eventLocationService->getEventLocations($event_id, $renderMap = true);
        $tickets        = $this->eventTicketService->getEventTickets($event_id);
        $organizers     = $this->organizerService->getUserOrganizers();
        $directory      = getDirectory('events', $event_id);

        if(!is_null($event->topic)){
            $eventSubTopics = $this->eventSubTopicService->getTopicSubTopics($event->topic->id);
        }else{
            $eventSubTopics = [];
        }
        return (['event' => $event, 'refundPolicies' => $refundPolicies, 'eventTopics' =>
            $eventTopics, 'categories' => $categories, 'eventTypes' => $eventTypes, 'eventSubTopics' =>
            $eventSubTopics, 'eventId' => $id, 'locations' => $locations, 'currencies' => $currencies, 'timeZones' =>
            $timeZones, 'tickets' => $tickets, 'layouts' => $layouts, 'organizers' => $organizers, 'directory' =>
            $directory, 'eventTags' => $eventTags]);
    }

    public function show($id, $locationId){
        $eventId        = decrypt_id($id);
        $locationId     = decrypt_id($locationId);
        $event          = $this->getByID($eventId);
        $locations      = $this->eventLocationService->getEventLocations($eventId);
        $eventLocation  = $this->eventLocationService->getTimeLocation($locationId);
        $tickets        = $this->eventTicketService->getTicketsByLocation($locationId);
        $tags           = $this->eventTagService->getEventTags($eventId);
        $moreEvents     = $this->eventRepo->getMoreEvents($event->vendor->id, $eventId);
        $directory      = getDirectory('events', $eventId);
        if(!empty($eventLocation)){
            Mapper::map($eventLocation->latitude , $eventLocation->longitude);
        }
        if(empty($event->event_layout_id)){
            $layout     = 'layout-1';
        }else{
            $layout         = $event->layout->name;
        }
        return (['event' => $event, 'layout' => $layout, 'eventId' => $id, 'locations' => $locations, 'eventLocation' => $eventLocation, 'tickets' => $tickets, 'directory' => $directory, 'moreEvents' => $moreEvents, 'tags' => $tags ]);
    }

    public function goLive($request){
        $eventId = decrypt_id($request->event_id);
        $event = $this->getByID($eventId);
        if(empty($event->header_image)){
            return ['type' => 'error', 'msg' => 'Please upload Header Image before going Live', 'data' => $event];
        }else{
            $event = $this->eventRepo->goLive($eventId);
            return ['type' => 'success', 'msg' => 'Your request has be forwarded, Your event will be live after Admin Approval', 'data' => $event];
        }
    }
}