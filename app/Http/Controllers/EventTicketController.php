<?php

namespace App\Http\Controllers;

use App\Services\Events\EventOrderService;
use App\Services\Events\EventService;
use Illuminate\Http\Request;
use App\Services\Events\EventTicketService;
//use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class EventTicketController extends Controller
{
    protected $eventTicketService;
    protected $eventService;
    protected $eventOrderService;

    public function __construct()
    {
        $this->eventTicketService = new EventTicketService;
        $this->eventOrderService = new EventOrderService;
        $this->eventService = new EventService;

    }

    public function myTickets(){
        $user = Auth::user();
        $tickets = $this->eventTicketService->getUserTickets($user->id);
        return View('tickets.user-tickets')->with(['orders' => $tickets, 'user' => $user, 'directory' => $user->directory]);
    }

}
