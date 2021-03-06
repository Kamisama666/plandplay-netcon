<?php

namespace App\Events;

use App\Game;
use App\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlayerRegistered
{
    use SerializesModels;

    public $game;

    public $player;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $player, Game $game)
    {
        $this->game = $game;
        $this->player = $player;
    }
}
