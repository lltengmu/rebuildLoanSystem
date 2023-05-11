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
        //得到当前新增client模型
        $client = $event->client;
        //得到场景分类
        $category = $event->category;
        //发送邮件
        app("email")->send($client->email,$category);
    }
    /**
     * handle after create loan case
     */
    public function handleCreatedCase(){}
}
