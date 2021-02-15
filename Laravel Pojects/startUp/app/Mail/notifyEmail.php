<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $emailDetails;
    public function __construct($data)
    {
        //
        $this->$emailDetails=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //emailDetails prop automatically sent to the veiw
        return $this->view('view.name');
    }
}
