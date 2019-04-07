<?php

namespace App\Listeners;

use App\Events\MessageSent;
use App\Jobs\SendEmail;
use App\Mail\MessageReceivedEmail;

class EmailMessageToGameParticipants {
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  MessageSent  $event
	 * @return void
	 */
	public function handle(MessageSent $event) {
		$sender = $event->sender;

		if (!$event->game->players()->count()) {
			return;
		}

		$receivers = $event->game->players;

		$receivers = $receivers->push($event->game->owner)->filter(function ($user) use ($sender) {
			return $user->email !== $sender->email;
		});

		if (!$receivers->count()) {
			return;
		}

		foreach ($receivers as $receiver) {
			SendEmail::dispatch($receiver, new MessageReceivedEmail($event->game, $sender, $receiver));
		}

	}
}
