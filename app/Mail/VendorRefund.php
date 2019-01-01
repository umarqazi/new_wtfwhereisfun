<?php

namespace App\Mail;

use App\EventOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VendorRefund extends Mailable
{
    use Queueable, SerializesModels;

    protected $eventOrder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventOrder $order)
    {
        $this->eventOrder    =      $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.vendor-refund')->with('order', $this->eventOrder);
    }
}
