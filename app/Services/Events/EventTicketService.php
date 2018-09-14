<?php
namespace App\Services\Events;

use App\Repositories\EventRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;
class EventTicketService extends BaseService
{
    protected $eventRepo;

    public function __construct(EventRepo $eventRepo)
    {
        $this->eventRepo   = $eventRepo;
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


}