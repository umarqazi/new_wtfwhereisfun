<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewDispute extends Mailable
{
    use Queueable, SerializesModels;

    public $dispute;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dispute)
    {
        $this->dispute = $dispute;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newDispute');
    }
}
