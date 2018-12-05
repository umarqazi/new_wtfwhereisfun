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

    public function getOrderById($orderId){
        return $this->eventOrderRepo->getOrderById($orderId);
    }

    public function getEventOrders($eventId){
        return $this->eventOrderRepo->getEventOrders($eventId);
    }

    public function getEventByOrderId($id){
        return $this->eventOrderRepo->getEventByOrderId($id);
    }

    public function getOrderByTickets($ticketId){
        return $this->eventOrderRepo->getTicketOrders($ticketId);
    }

    public function getWeekOrderByTickets($ticketId){
        return $this->eventOrderRepo->getWeekOrderByTickets($ticketId);
    }

    public function getMonthOrderByTickets($ticketId){
        return $this->eventOrderRepo->getMonthOrderByTickets($ticketId);
    }

    public function updateOrderQrImage($id, $imgName){
        return $this->eventOrderRepo->updateQrImage($id, $imgName);
    }

    public function updateOrderPdfName($id, $imgName){
        return $this->eventOrderRepo->updatePdfName($id, $imgName);
    }

}