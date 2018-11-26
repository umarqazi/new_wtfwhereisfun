<?php
namespace App\Services\Events;

use App\Repositories\EventOrderRepo;
class EventOrderService
{
    protected $eventOrderRepo;

    public function __construct()
    {
        $this->eventOrderRepo   = new EventOrderRepo;
    }

    public function getEventOrders($eventId){
        return $this->eventOrderRepo->getEventOrders($eventId);
    }

    public function getOrderByTickets($ticketId){
        return $this->eventOrderRepo->getTicketOrders($ticketId);
    }


}