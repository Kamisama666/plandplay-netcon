<?php

namespace App\Listeners;

use App\Events\PlayerUnregistered;
use App\Jobs\SendEmail;
use App\Mail\PlayerUnregisteredEmail;

class SendPlayerUnregisteredEmail {
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
	 * @param  PlayerUnregistered  $event
	 * @return void
	 */
	public function handle(PlayerUnregistered $event) {
		$owner = $event->game->owner;
		SendEmail::dispatch($owner, new PlayerUnregisteredEmail($event->game, $owner));
	}
}
