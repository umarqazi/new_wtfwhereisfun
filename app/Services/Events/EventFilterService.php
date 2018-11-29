<?php

namespace App\Services\Events;

use App\EventOrder;
use App\Repositories\EventLocationRepo;
use App\Services\Events\EventTicketService;
use App\Services\Events\EventOrderService;
use Carbon\Carbon;
class EventFilterService
{
    protected $eventLocationRepo;
    protected $eventTicketService;
    protected $eventOrderService;

    public function __construct()
    {
        $this->eventLocationRepo    = new EventLocationRepo;
        $this->eventTicketService   = new EventTicketService;
        $this->eventOrderService    = new EventOrderService;
    }

    public function getTotalEvents($startDate, $endDate, $userId = null){
        return $this->eventLocationRepo->getPastEvents($startDate, $endDate, $userId);
    }

    public function getEventsEarningByTime($timeLocations){
        $timeLocationIds = $timeLocations->pluck('id')->toArray();
        $tickets         = $this->eventTicketService->getTicketsByLocation($timeLocationIds);
        $ticketIds       = $tickets->pluck('id')->toArray();
        $orders          = $this->eventOrderService->getOrderByTickets($ticketIds);
        return $orders->sum('payment_gross');
    }

    public function getLastWeekEventDetails($endDate, $user){
        $lastWeek           = Carbon::today()->subWeek();
        $pastWeekEvents     = $this->getTotalEvents($lastWeek, $endDate, $user);
        $pastWeekEarning    = $this->getEventsEarningByTime($pastWeekEvents);
        return ['count' => $pastWeekEvents->count(), 'totalEarning' => $pastWeekEarning];
    }

    public function getLastMonthEventDetails($endDate, $user){
        $lastMonth          = Carbon::today()->subMonth();
        $pastMonthEvents    = $this->getTotalEvents($lastMonth, $endDate, $user);
        $pastMonthEarning   = $this->getEventsEarningByTime($pastMonthEvents);
        return ['count' => $pastMonthEvents->count(), 'totalEarning' => $pastMonthEarning];
    }

    public function getLastYearEventDetails($endDate, $user){
        $lastYear          = Carbon::today()->subYear();
        $lastYearEvents    = $this->getTotalEvents($lastYear, $endDate, $user);
        $lastYearEarning   = $this->getEventsEarningByTime($lastYearEvents);
        return ['count' => $lastYearEvents->count(), 'totalEarning' => $lastYearEarning];
    }

    public function searchEvents($searchData){
        $searchResults = $this->eventLocationRepo->search($searchData);
        $response = [];
        $response['count'] = count($searchResults);
        if(isset($searchData['type'])){
            $searchResults = searchResultsDropdown($searchResults, $response['count']);
        }
        $response['results'] = $searchResults;
        return $response;
    }

}