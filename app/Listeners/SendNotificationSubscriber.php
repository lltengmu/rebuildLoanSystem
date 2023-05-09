<?php

namespace App\Listeners;

use App\Events\ClientCreated;
use App\Models\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationSubscriber
{
    /**
     * register listener for subscriber
     *
     * @param  \Illuminate\Events\Dispatcher  $event
     * @return void
     */
    public function subscribe($event)
    {
        $event->listen(
            "App\Events\ClientCreated",
            [SendNotificationSubscriber::class,"handleCreatedClient"]
        );
    }
    /**
     * handle after create client.
     *
     * @return void
     */
    public function handleCreatedClient(ClientCreated $event)
    {
        //可以拿到当前client对象,和场景类别
        \dump($event->client);
        \dump($event->category);
    }
    /**
     * handle after create loan case
     */
    public function handleCreatedCase(){}
}
