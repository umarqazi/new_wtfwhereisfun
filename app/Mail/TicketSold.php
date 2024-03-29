<?php

namespace App\Mail;

use App\EventOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketSold extends Mailable
{
    use Queueable, SerializesModels;

    public $orderDetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventOrder $orderDetails)
    {
        $this->orderDetails = $orderDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ticket-sold');
    }
}
