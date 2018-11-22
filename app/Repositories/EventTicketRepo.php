<?php
namespace App\Repositories;

use App\EventTicket;
class EventTicketRepo
{
    protected $ticketModel;

    public function __construct()
    {
        $this->ticketModel = new EventTicket();
    }

    public function getTicketById($id){
        return $this->ticketModel->findOrFail($id)->load('event');
    }

    public function updateEventTicket($request, $eventId){
        if($request->request_type == 'store'){
            $eventTicket = new EventTicket;
            $eventTicket->event_id            =       $eventId;
        }else{
            $eventTicket = EventTicket::find($request->ticket_id);
        }
        $eventTicket->name                    =       $request->name;
        $eventTicket->quantity                =       $request->quantity;
        $eventTicket->price                   =       $request->price;
        $eventTicket->description             =       $request->description;
        $eventTicket->selling_start           =       $request->selling_start;
        $eventTicket->selling_end             =       $request->selling_end;
        $eventTicket->status                  =       $request->status;
        $eventTicket->min_order               =       $request->min_order;
        $eventTicket->max_order               =       $request->max_order;
        $eventTicket->type                    =       $request->type;
        $eventTicket->availability            =       $request->availability;
        $eventTicket->time_location_id        =       $request->time_location_id;

        $eventTicket->save();
        return $eventTicket;
    }

    public function deleteTicket($request){
        $eventTicket = EventTicket::destroy($request->ticket_id);
    }

    public function updateEventTicketPass($request){
        if($request->request_type == 'store'){
            $eventTicketPass = new TicketPass;
            $eventTicketPass->ticket_id      =       $request->ticket_id;
        }else{
            $eventTicketPass = TicketPass::find($request->pass_id);
        }
        $eventTicketPass->name               =       $request->pass_name;

        $eventTicketPass->save();
        return $eventTicketPass;
    }

    public function deleteTicketPass($request){
        $eventTicketPass = TicketPass::destroy($request->pass_id);
    }

}