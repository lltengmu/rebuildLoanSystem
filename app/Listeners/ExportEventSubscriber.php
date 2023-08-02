<?php

namespace App\Listeners;

use App\Models\ExportLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;
use Illuminate\Queue\InteractsWithQueue;

class ExportEventSubscriber
{
    /**
     * Handle export event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleExportExcelEvent($event): void
    {
        ExportLog::create(
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
            "App\Events\ExportEvent",
            [ExportEventSubscriber::class, "handleExportExcelEvent"]
        );
    }
}
