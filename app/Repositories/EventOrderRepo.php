<?php
namespace App\Repositories;

use App\EventOrder;
class EventOrderRepo
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new EventOrder();
    }

    public function getUserTickets($userId){
        return $this->orderModel->getUserOrders($userId)->getCompletedOrders()->recentCreatedAt()->get();
    }

    public function getEventOrders($eventId){
        return $this->orderModel->getEventOrders($eventId)->getCompletedOrders()->recentCreatedAt()->get();
    }

    public function getTicketOrders($ticketId){
        return $this->orderModel->getTicketOrders($ticketId)->getCompletedOrders()->get();
    }

    public function getEventByOrderId($id){
//        dd('adeeel');
//        return $this->orderModel->getEventByOrderId($id)->get();
        return EventOrder::find($id);
    }

}