<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Events\EventTicketService;
use Illuminate\Support\Facades\Auth;
class EventTicketController extends Controller
{
    protected $eventTicketService;

    public function __construct()
    {
        $this->eventTicketService = new EventTicketService;
    }

    public function myTickets(){
        $user = Auth::user();
        $tickets = $this->eventTicketService->getUserTickets($user->id);
        return View('tickets.user-tickets')->with(['orders' => $tickets, 'user' => $user, 'directory' => $user->directory]);
    }
}
