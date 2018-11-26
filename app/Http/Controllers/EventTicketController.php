<?php

namespace App\Http\Controllers;

use App\Services\Events\EventOrderService;
use App\Services\Events\EventService;
use Illuminate\Http\Request;
use App\Services\Events\EventTicketService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
//        dd($tickets[0]->event);
        return View('tickets.user-tickets')->with(['orders' => $tickets, 'user' => $user, 'directory' => getDirectory('vendors', $user->id)]);
    }

//    public function dispute($id){
//        $id = decrypt_id($id);
//        $event = $this->eventOrderService->getEventByOrderId($id);
//        $event_details = $this->eventService->getByID($event->event_id);
//        return view('tickets.disputeForm')->with(['event_details' => $event_details, 'order_id' => $id]);
//    }
//
//    public function submit_dispute(Request $request){
////        $user = Auth::user();
//
//        dd($request);
//
//    }
}
