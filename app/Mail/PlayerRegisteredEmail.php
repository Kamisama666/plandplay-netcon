<?php

namespace App\Mail;

use App\Game;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlayerRegisteredEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $game;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Game $game, User $user)
    {
        $this->game = $game;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('¡Nueva jugadora registrada en tu partida de las Netcon!')->view('emails.message-received');
    }
}
