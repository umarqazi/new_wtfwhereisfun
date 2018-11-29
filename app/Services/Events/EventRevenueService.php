<?php

namespace App\Services\Events;

use App\Services\Events\EventTimeLocationService;
use App\Services\Events\EventOrderService;
class EventRevenueService
{
    protected $eventOrderService;
    protected $eventLocationService;

    public function __construct()
    {
        $this->eventOrderService            = new EventOrderService;
        $this->eventLocationService         = new EventTimeLocationService;
    }

    public function getTotalRevenueByLocation($locationId){
        $location           = $this->eventLocationService->getTimeLocation($locationId);
        $totalQty           = $location->tickets->sum('quantity');
        $ticketIds          = $location->tickets->pluck('id')->toArray();
        $orders             = $this->eventOrderService->getOrderByTickets($ticketIds);
        if(count($orders) > 0){
            $soldQty            = $orders->sum('quantity');
            $revenuePercentage  = $soldQty/$totalQty * 100;
        }else{
            $revenuePercentage  = 0;
        }
        return ['revenuePercentage' => $revenuePercentage, 'totalRevenue' => $orders->sum('payment_gross'), 'orders' => $orders, 'count' => $orders->count()];
    }

    public function getWeekRevenueByLocation($locationId){
        $location           = $this->eventLocationService->getTimeLocation($locationId);
        $ticketIds          = $location->tickets->pluck('id')->toArray();
        $orders             = $this->eventOrderService->getWeekOrderByTickets($ticketIds);
        return ['totalRevenue' => $orders->sum('payment_gross'), 'orders' => $orders, 'count' => $orders->count()];
    }

    public function getMonthRevenueByLocation($locationId){
        $location           = $this->eventLocationService->getTimeLocation($locationId);
        $ticketIds          = $location->tickets->pluck('id')->toArray();
        $orders             = $this->eventOrderService->getMonthOrderByTickets($ticketIds);
        return ['totalRevenue' => $orders->sum('payment_gross'), 'orders' => $orders, 'count' => $orders->count()];
    }



}