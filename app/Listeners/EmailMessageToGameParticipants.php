<?php

namespace App\Listeners;

use App\Events\MessageSent;
use App\Mail\MessageReceivedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailMessageToGameParticipants
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $sender = $event->sender;

        if (!$event->game->players()->count()) {
            return;
        }

        $receivers = $event->game->players;

        $receivers = $receivers->push($event->game->owner)->filter(function($user) use ($sender) {
            return $user->email !== $sender->email;
        });

        if (!$receivers->count()) {
            return;
        }

        foreach ($receivers as $receiver) {
            Mail::to($receiver)->send(new MessageReceivedEmail($event->game, $receiver));
        }

    }
}
