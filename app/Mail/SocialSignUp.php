<?php

namespace App\Mail;

use App\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SocialSignUp extends Mailable
{
    use Queueable, SerializesModels;

    protected $reset_password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ResetPassword $reset_password)
    {
        $this->reset_password = $reset_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.social-signup')->with('reset_password', $this->reset_password);
    }
}
