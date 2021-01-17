<?php

namespace Modules\FormAntrian\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $pass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pass)
    {
        $this->pass = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('form-antrian::emails.confirmation_rejected')->with('pass', $this->pass);
    }
}
