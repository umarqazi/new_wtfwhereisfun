<?php

namespace App\Mail;

use App\WaitList;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WaitListMailing extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var WaitList
     */
    protected $waitList;

    /**
     * WaitListMailing constructor.
     * @param WaitList $waitList
     */
    public function __construct(WaitList $waitList)
    {
        $this->waitList    =   $waitList;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.wait-list-mail')->with('waitList', $this->waitListItem);
    }
}
