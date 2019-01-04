<?php

namespace App\Mail;

use App\WaitingListSetting;
use App\WaitList;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WaitingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $waitListItem;
    protected $waitingListSetting;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(WaitList $waitList, WaitingListSetting $waitingListSetting)
    {
        $this->waitListItem             =   $waitList;
        $this->waitingListSetting       =   $waitingListSetting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.wait-con')->with(['waitList' => $this->waitListItem, 'waitingListSetting' => $this->waitingListSetting]);
    }
}
