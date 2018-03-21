<?php

namespace App\Events;

use App\Game;
use App\User;
use Illuminate\Queue\SerializesModels;

class MessageSent
{
    use SerializesModels;

    public $game;

    public $sender;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Game $game, User $sender)
    {
        $this->game = $game;
        $this->sender = $sender;
    }
}
