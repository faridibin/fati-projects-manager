<?php

namespace App\Listeners\Password;

use App\Events\Password\PasswordChanged as PasswordChangedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PasswordChanged
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\Password\PasswordChangedEvent  $event
     * @return void
     */
    public function handle(PasswordChangedEvent $event)
    {
        $event->user->password_history()->create(['password' => $event->user->password]);
    }
}
