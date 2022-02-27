<?php

namespace App\Listeners\Password;

use App\Events\Password\PasswordChanged;
use App\Mail\Password\PasswordChanged as PasswordChangedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPasswordChangedNotification
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
     * @param  \App\Events\Password\PasswordChanged  $event
     * @return void
     */
    public function handle(PasswordChanged $event)
    {
        if ($event->notify) {
            // TODO: Generate password error link

            Mail::send(new PasswordChangedMail($event->user));
        }
    }
}
