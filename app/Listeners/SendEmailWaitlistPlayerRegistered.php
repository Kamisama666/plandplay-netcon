<?php

namespace App\Listeners;

use App\Events\WaitlistPlayerRegistered;
use App\Mail\WaitlistPlayerRegisteredMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailWaitlistPlayerRegistered
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
     * @param  WaitlistPlayerRegistered  $event
     * @return void
     */
    public function handle(WaitlistPlayerRegistered $event)
    {
        Mail::to($event->player)->send(new WaitlistPlayerRegisteredMail($event->game, $event->player));
    }
}
