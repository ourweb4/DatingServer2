<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\messages;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $rec;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(messages $message)
    {
        $this->rec = $message;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.NewMessage');
    }
}
