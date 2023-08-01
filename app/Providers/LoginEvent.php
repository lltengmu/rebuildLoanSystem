<?php

namespace App\Providers;

use App\Providers\UserLoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginEvent
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
     * @param  \App\Providers\UserLoginEvent  $event
     * @return void
     */
    public function handle(UserLoginEvent $event)
    {
        //
    }
}
