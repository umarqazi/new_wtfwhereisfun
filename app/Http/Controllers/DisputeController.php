<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveDisputeRequest;
use App\Mail\NewDispute;
use App\Services\Events\EventListingService;
use App\Services\Events\EventOrderService;
use App\Services\Events\EventService;
use App\Services\Events\TicketDisputeService;
use Illuminate\Http\Request;
use App\Services\Events\EventTicketService;
use Illuminate\Support\Facades\Auth;
use Mail;

class DisputeController extends Controller
{
    protected $eventTicketService;
    protected $eventService;
    protected $eventOrderService;
    protected $ticketDisputeService;
    protected $eventListingService;

    public function __construct()
    {
        $this->eventTicketService = new EventTicketService;
        $this->eventOrderService = new EventOrderService;
        $this->eventService = new EventService;
        $this->ticketDisputeService = new TicketDisputeService();
        $this->eventListingService = new EventListingService();
    }

    public function index(){
        $user = Auth::user();
        $user_disputes = $this->ticketDisputeService->getByUserId($user->id);
        return view('tickets.disputeList')->with('user_disputes',$user_disputes);
    }

    public function create($id){
        $id    = decrypt_id($id);
        $event = $this->eventOrderService->getEventByOrderId($id);
        $event_details = $this->eventService->getByID($event->event_id);
        return view('tickets.disputeForm')->with(['event_details' => $event_details, 'order_id' => $id, 'user' => Auth::user()]);
    }

    public function store(SaveDisputeRequest $request){
        $user = Auth::user();
        $dispute = $this->ticketDisputeService->store($request->all(),$user->id);
        $vendor = $this->ticketDisputeService->getVendor($dispute);

        Mail::to($user->email)->send(new NewDispute($dispute));
        Mail::to($vendor)->send(new NewDispute($dispute));

        return redirect('/my-tickets');
    }

    public function show($id){
        $user = Auth::user();
        $id = decrypt_id($id);
        $dispute_details = $this->ticketDisputeService->getById($id);
        $event_details = $this->eventService->getByID($dispute_details->event_id);
        $this->ticketDisputeService->changeSeenStatus($user,$dispute_details);
        return view('tickets.disputeDetail')->with(['event_details' => $event_details, 'dispute_details' => $dispute_details]);
    }

    public function showComplaints(){
        $user = Auth::user();
        $vendorEvents = $this->eventListingService->getAllEvents($user->id);
        $eventIds = $vendorEvents->pluck('id')->toArray();
        $vendorDisputes = $this->ticketDisputeService->getVendorDisputes($eventIds);
        return view('tickets.complaintList')->with('vendorDisputes',$vendorDisputes);
    }

    public function closeComplaints(Request $request)
    {
        $dispute_detail = $this->ticketDisputeService->getById($request->dispute_id);
        $this->ticketDisputeService->closeDispute($dispute_detail->id);
        return redirect('/complaints');
    }

    public function reply(Request $request)
    {
        $reply =  $this->ticketDisputeService->disputeReply($request->all());
        $this->ticketDisputeService->changeReplySeenStatus($reply->dispute_id);
        $this->ticketDisputeService->sendEmailNotification($reply);
        return redirect('/disputes/'.encrypt_id($request->dispute_id));
    }

}
