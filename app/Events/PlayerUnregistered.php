<?php

namespace App\Events;

use App\Game;
use App\User;

class PlayerUnregistered
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
}
