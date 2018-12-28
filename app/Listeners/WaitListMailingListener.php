<?php

namespace App\Listeners;

use App\Events\WaitListMailingEvent;
use App\Services\Events\EventTicketService;
use App\Services\MailService;
class WaitListMailingListener
{
    protected $eventTicketService;
    protected $mailService;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->eventTicketService = new EventTicketService;
        $this->mailService        = new MailService;
    }

    /**
     * Handle the event.
     *
     * @param  WaitListMailingEvent  $event
     * @return void
     */
    public function handle(WaitListMailingEvent $event)
    {
        $waitList = $this->eventTicketService->getTicketWaitList($event->eventTicket->id);
        $this->mailService->sendWaitListMails($waitList);
    }
}
