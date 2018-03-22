<?php

namespace App\Mail;

use App\Game;
use App\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlayerUnregisteredEmail extends Mailable
{
    public $game;

    public $owner;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Game $game, User $owner)
    {
        $this->game = $game;
        $this->owner = $owner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Netcon: Una jugadora ha tenido que dejar tu partida')->view('emails.player-unregistered');
    }
}
