<?php

namespace App\Mail;

use App\Dispute;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewDispute extends Mailable
{
    use Queueable, SerializesModels;

    protected $disputeDetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Dispute $dispute)
    {
        $this->disputeDetails = $dispute;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newDispute')->with('dispute', $this->disputeDetails);
    }
}
