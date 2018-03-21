<?php

namespace App\Events;

use App\Game;
use App\User;
use Illuminate\Queue\SerializesModels;

class WaitlistPlayerRegistered
{
    use SerializesModels;

    public $player;

    public $game;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $player, Game $game)
    {
        $this->player = $player;
        $this->game = $game;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
