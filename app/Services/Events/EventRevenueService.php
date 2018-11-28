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
        $soldQty            = $orders->sum('quantity');
        $revenuePercentage  = $soldQty/$totalQty * 100;
        return ['revenuePercentage' => $revenuePercentage, 'totalRevenue' => $orders->sum('payment_gross')];
    }

}