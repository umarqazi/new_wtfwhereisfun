<?php

namespace App\Services;

use App\Mail\AdminContactUs;
use App\Mail\ContactUs;
use App\Mail\CustomerRefund;
use App\Mail\NewDispute;
use App\Mail\TicketPurchased;
use App\Mail\TicketSold;
use App\Mail\UserContactUs;
use App\Mail\VendorRefund;
use App\Mail\VerifyMail;
use App\Mail\WaitListMailing;
use App\Services\Events\TicketDisputeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Services\Events\EventOrderService;
class MailService
{

    protected $eventOrderService;
    protected $disputeService;

    public function __construct()
    {
        $this->eventOrderService    =   new EventOrderService();
        $this->disputeService       =   new TicketDisputeService();
    }

    public function ticketNotification($orderId){
        $order = $this->eventOrderService->getOrderById($orderId);
        Mail::to($order->user->email)->queue(new TicketPurchased($order));
        Mail::to($order->event->vendor->email)->queue(new TicketSold($order));
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

    public function sendDisputeMails($dispute){
        Mail::to(Auth::user()->email)->queue(new NewDispute($dispute));
        Mail::to($dispute->event->vendor->email)->queue(new NewDispute($dispute));
    }

    public function sendContactUsEmail($contactUs){
        Mail::to(env("ADMIN_EMAIL", "stubguys1@gmail.com"))->queue(new AdminContactUs($contactUs));
        Mail::to($contactUs->email)->queue(new UserContactUs($contactUs));
    }

    public function sendVerificationMail($user){
        Mail::to($user->email)->queue(new VerifyMail($user));
    }

}