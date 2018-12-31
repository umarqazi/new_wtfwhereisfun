<?php

namespace App\Listeners;

use App\Events\OrderRefundMailingEvent;
use App\Services\MailService;
class OrderRefundMailingListener
{
    protected $mailService;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->mailService        = new MailService;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderRefundMailingEvent $event)
    {
        $this->mailService->sendRefundMails($event->eventOrder);
    }
}
