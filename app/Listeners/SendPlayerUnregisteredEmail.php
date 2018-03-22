<?php

namespace App\Listeners;

use App\Events\PlayerUnregistered;
use App\Mail\PlayerUnregisteredEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPlayerUnregisteredEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PlayerUnregistered  $event
     * @return void
     */
    public function handle(PlayerUnregistered $event)
    {
        $owner = $event->game->owner;
        Mail::to($owner)->send(new PlayerUnregisteredEmail($event->game, $owner));
    }
}
