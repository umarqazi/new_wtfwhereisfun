<?php

namespace App\Mail\DisputeReplyMail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DisputeReply extends Mailable
{
    use Queueable, SerializesModels;
    public $reply;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reply)
    {
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.disputeReply');
    }
}
