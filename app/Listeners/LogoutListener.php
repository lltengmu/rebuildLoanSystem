<?php

namespace App\Listeners;

use App\Events\Logout;
use App\Models\Client;
use App\Models\Individuals;
use App\Models\ServiceProvider;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogoutListener
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $identify = $event->identify;
        $email = $event->email;
        switch ($identify):
            case "clients":
                Client::where("email", $email)->update(["last_login_datetime" => date("Y-m-d H:m:s")]);
                break;
            case "individual":
                Individuals::where("email", $email)->update(["last_login_datetime" => date("Y-m-d H:m:s")]);
                break;
            case "sp":
                ServiceProvider::where("email", $email)->update(["last_login_datetime" => date("Y-m-d H:m:s")]);
                break;
        endswitch;
    }
}
