<?php

namespace App\Listeners;

use App\Events\PlayerRegistered;
use App\Jobs\SendEmail;
use App\Mail\PlayerRegisteredEmail;

class SendPlayerRegisteredEmail {

	/**
	 * Handle the event.
	 *
	 * @param  PlayerRegistered  $event
	 * @return void
	 */
	public function handle(PlayerRegistered $event) {
		$owner = $event->game->owner;
		SendEmail::dispatch($owner, new PlayerRegisteredEmail($event->game, $owner, $event->player));
	}
}
