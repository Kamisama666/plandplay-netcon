<?php

namespace App\Mail;

use App\Game;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WaitlistPlayerRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $game;

    public $player;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Game $game, User $player)
    {
        $this->game = $game;
        $this->player = $player;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('¡Has entrado en una de tus partidas de la reseva en las Netcon!')->view('emails.waitlist-player-registered');
    }
}
