<?php

namespace App\Mail;

use App\EventOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class TicketPurchased extends Mailable
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
        $directory = getDirectory('orders', $this->orderDetails->id);
        $file = public_path('storage/').removeFirstParam($directory['relative_path']).$this->orderDetails->ticket_pdf;
        return $this->view('emails.ticket-purchased')->attach($file);
    }
}
