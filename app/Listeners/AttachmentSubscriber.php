<?php

namespace App\Listeners;

use App\Models\AttachmentLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;
use Illuminate\Queue\InteractsWithQueue;

class AttachmentSubscriber
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleAttachmenEvent($event)
    {
        AttachmentLog::create(
            $event->insert
        );
    }
    /**
     * 为订阅者注册侦听器。
     *
     *  @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe(Dispatcher $event)
    {
        $event->listen(
            "App\Events\AttachmentEvent",
            [AttachmentSubscriber::class, "handleAttachmenEvent"]
        );
    }
}
