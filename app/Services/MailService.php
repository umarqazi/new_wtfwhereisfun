<?php

namespace App\Services;

use App\Mail\CustomerRefund;
use App\Mail\TicketPurchased;
use App\Mail\TicketSold;
use App\Mail\VendorRefund;
use App\Mail\WaitListMailing;
use Illuminate\Support\Facades\Mail;
use App\Services\Events\EventOrderService;
class MailService
{

    protected $eventOrderService;

    public function __construct()
    {
        $this->eventOrderService    =   new EventOrderService;
    }

    public function ticketNotification($orderId){
        $order = $this->eventOrderService->getOrderById($orderId);
        Mail::to($order->user->email)->send(new TicketPurchased($order));
        Mail::to($order->event->vendor->email)->send(new TicketSold($order));
    }

    public function sendWaitListMails($waitList){
        foreach($waitList as $item){
            Mail::to($item->email)->send(new WaitListMailing($item));
        }
    }

    public function sendRefundMails($order){
        Mail::to($order->user->email)->send(new CustomerRefund($order));
        Mail::to($order->event->vendor->email)->send(new VendorRefund($order));
    }
}