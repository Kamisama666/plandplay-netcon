<?php

namespace App\Mail;

use App\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceivedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $game;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Netcon: Mensaje Recibido')->view('emails.message-received');
    }
}
