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
        return $this->orderModel->getUserOrders($userId)->recentCreatedAt()->get()->load(['event', 'ticket']);
    }

    public function getEventOrders($eventId){
        return $this->orderModel->getEventOrders($eventId)->recentCreatedAt()->get();
    }

    public function getEventByOrderId($id){
//        dd('adeeel');
//        return $this->orderModel->getEventByOrderId($id)->get();
        return EventOrder::find($id);
    }

}