<?php

namespace App\Services;

use App\Mail\TicketPurchased;
use App\Mail\TicketSold;
use Illuminate\Support\Facades\Mail;
class MailService
{

    public function ticketNotification($order){
        Mail::to($order->user->email)->send(new TicketPurchased($order));
        Mail::to($order->event->vendor->email)->send(new TicketSold($order));
    }
}