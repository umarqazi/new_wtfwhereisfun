<?php
namespace App\Services\Events;

use App\Repositories\EventRepo;
use Illuminate\Http\Response;
use App\Services\IDBService;
use App\Services\BaseService;
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
use Alert;
use Illuminate\Support\Facades\Redirect;
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

    public function __construct(){
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
        $categories     = $this->categoryServices->getAll();
        $eventTypes     = $this->eventTypeService->getAll();
        $currencies     = $this->currencyService->getAll();
        $timeZones      = $this->timeZoneService->getAll();
        $layouts        = $this->eventLayoutService->getAll();
        $locations      = $this->eventLocationService->getEventLocations($event_id);
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
            $directory]);
    }

    public function show($id){
        $event_id       = decrypt_id($id);
        $event          = $this->getByID($event_id);
        $locations      = $this->eventLocationService->getEventLocations($event_id);
        $tickets        = $this->eventTicketService->getEventTickets($event_id);
        $directory      = getDirectory('events', $event_id);
        if(empty($event->event_layout_id)){
            $layout     = 'layout-1';
        }else{
            $layout         = $event->layout->name;
        }
        return (['event' => $event, 'layout' => $layout, 'eventId' => $id, 'locations' => $locations, 'tickets' => $tickets, 'directory' => $directory, '']);
    }
}