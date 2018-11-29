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
        return $this->orderModel->getTicketOrders($ticketId)->getCompletedOrders()->recentCreatedAt()->get();
    }

    public function getEventByOrderId($id){
        return EventOrder::find($id);
    }

    public function getWeekOrderByTickets($ticketId){
        return $this->orderModel->getWeeklyTicketOrders($ticketId)->getCompletedOrders()->get();
    }

    public function getMonthOrderByTickets($ticketId){
        return $this->orderModel->getMonthlyTicketOrders($ticketId)->getCompletedOrders()->get();
    }

}