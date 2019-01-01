<?php
namespace App\Services\Events;

use App\Repositories\EventOrderRepo;
use App\Repositories\EventRepo;
use App\Repositories\EventTicketRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use App\Services\WaitingListService;
use Illuminate\Http\Response;
class EventTicketService extends BaseService
{
    protected $eventRepo;
    protected $eventTicketRepo;
    protected $eventOrderRepo;
    protected $waitingListService;

    public function __construct()
    {
        $this->eventRepo            = new EventRepo;
        $this->eventTicketRepo      = new EventTicketRepo;
        $this->eventOrderRepo       = new EventOrderRepo;
        $this->waitingListService   = new WaitingListService;
    }

    public function getEventTickets($id){
        return $this->eventRepo->getEventTickets($id);
    }

    public function updateEventTicket($request, $eventId){
        return $this->eventTicketRepo->updateEventTicket($request, $eventId);
    }

    public function addNewTicket($request, $locations){
        return addNewTicket($request, $locations);
    }

    public function deleteTicket($request){
        $this->eventTicketRepo->deleteTicket($request);
    }

    public function addNewTicketPass($request){
        return addNewTicketPass($request);
    }

    public function updateEventTicketPass($request){
        return $this->eventTicketRepo->updateEventTicketPass($request);
    }

    public function deleteTicketPass($request){
        $this->eventTicketRepo->deleteTicketPass($request);
    }

    public function getTicketDetails($id){
        return $this->eventTicketRepo->getTicketById($id);
    }

    public function get($id){
        return $this->eventTicketRepo->getTicketById($id);
    }

    public function getUserTickets($userId){
        return $this->eventOrderRepo->getUserTickets($userId);
    }

    public function getTicketsByLocation($locationId){
        return $this->eventTicketRepo->getTicketsByLocation($locationId);
    }

    public function getRemainingQty($ticketId){
        $ticketOrders = $this->eventOrderRepo->getTicketOrders($ticketId);
        $ticket       = $this->getTicketDetails($ticketId);
        if(count($ticketOrders) > 0){
            $soldQty      = $ticketOrders->sum('quantity');
            $qtyLeft      = $ticket->quantity - $soldQty;
        }else{
            $qtyLeft      = $ticket->quantity;
        }
        return $qtyLeft;
    }

    public function updateTicketSkuId($ticketId, $sku){
        return $this->eventTicketRepo->updateTicketSkuId($ticketId, $sku);
    }

    public function getTicketWaitList($ticketId){
        $ticket = $this->getTicketDetails($ticketId);
        if($ticket->time_location->wait_list_setting != null){
            return $this->waitingListService->getTicketWaitingList($ticket->id);
        }else{
            return [];
        }
    }

}