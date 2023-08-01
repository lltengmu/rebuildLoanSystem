<?php

namespace App\Providers;

use App\Events\LogoutEvent;
use App\Listeners\LogoutListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;
use App\Listeners\SendNotificationSubscriber;
use App\Listeners\UserEventSubscriber;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [];
    /**
     * register subscriber
     */
    protected $subscribe = [
        //注册用户事件订阅者
        UserEventSubscriber::class
    ];

    /**
     * Register any events for your application.
     * 
     * 注册任意的其他事件和监听器。
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
