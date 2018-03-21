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
        Mail::to($event->game->owner)->send(new PlayerRegisteredEmail($event->game, $event->game->owner));
    }
}
