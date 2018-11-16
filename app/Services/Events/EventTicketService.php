<?php
namespace App\Services\Events;

use App\Repositories\EventOrderRepo;
use App\Repositories\EventRepo;
use App\Repositories\EventTicketRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;
class EventTicketService extends BaseService
{
    protected $eventRepo;
    protected $eventTicketRepo;
    protected $eventOrderRepo;

    public function __construct()
    {
        $this->eventRepo        = new EventRepo;
        $this->eventTicketRepo  = new EventTicketRepo;
        $this->eventOrderRepo   = new EventOrderRepo;
    }

    public function getEventTickets($id){
        return $this->eventRepo->getEventTickets($id);
    }

    public function updateEventTicket($request, $eventId){
        return $this->eventRepo->updateEventTicket($request, $eventId);
    }

    public function addNewTicket($request){
        return addNewTicket($request);
    }

    public function deleteTicket($request){
        $this->eventRepo->deleteTicket($request);
    }

    public function addNewTicketPass($request){
        return addNewTicketPass($request);
    }

    public function updateEventTicketPass($request){
        return $this->eventRepo->updateEventTicketPass($request);
    }

    public function deleteTicketPass($request){
        $this->eventRepo->deleteTicketPass($request);
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

}