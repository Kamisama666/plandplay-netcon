<?php

namespace App\Listeners;

use App\Events\PlayerRegistered;
use App\Mail\PlayerRegisteredEmail;
use Illuminate\Support\Facades\Mail;

class SendPlayerRegisteredEmail
{

    /**
     * Handle the event.
     *
     * @param  PlayerRegistered  $event
     * @return void
     */
    public function handle(PlayerRegistered $event)
    {
        $owner = $event->game->owner;
        Mail::to($owner)->send(new PlayerRegisteredEmail($event->game, $owner, $event->player));
    }
}
