<?php

namespace App\Listeners;

use App\Events\WaitlistPlayerRegistered;
use App\Jobs\SendEmail;
use App\Mail\WaitlistPlayerRegisteredMail;

class SendEmailWaitlistPlayerRegistered {
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
	 * @param  WaitlistPlayerRegistered  $event
	 * @return void
	 */
	public function handle(WaitlistPlayerRegistered $event) {
		SendEmail::dispatch($event->player, new WaitlistPlayerRegisteredMail($event->game, $event->player));
	}
}
