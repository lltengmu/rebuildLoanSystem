<?php

namespace App\Listeners;

use App\Models\EmailVerificationLog;
use App\Models\UserLoginLog;
use Jenssegers\Agent\Agent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;
use Illuminate\Queue\InteractsWithQueue;

class UserEventSubscriber
{
    /**
     * Handle user sign in event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleUserLogin($event):void
    {
        //向 User login log 表中添加记录
        UserLoginLog::create(
            [
                "user_id" => $event->user->id,
                "email" => $event->user->email,
                "when" => date("Y-m-d H:m:s"),
                "identify" => $event->identify,

            ] + $event->equipmentInformation
        );
    }
    /**
     * Handle user log out event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleUserLogout($event):void
    {
        $event->user->update(
            [
                "last_login_datetime" => date("Y-m-d H:m:s")
            ]
        );
    }
    /**
     * Handle user log out event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleEmailVerified($event):void
    {
        $agent = new Agent();

        $log = new EmailVerificationLog([
            "client_id" => $event->user->id,
            "when" => date("Y-m-d H:m:s"),
            "ip" => request()->ip(),
            "browser" => $agent->browser(),
            "device" => $agent->device(),
            "platform" => $agent->platform()
        ]);

        $event->user->verificationlog()->save($log);
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
            "App\Events\LogoutEvent",
            [UserEventSubscriber::class, "handleUserLogout"]
        );
        $event->listen(
            "App\Events\LoginEvent",
            [UserEventSubscriber::class, "handleUserLogin"]
        );
        $event->listen(
            "App\Events\EmailVerifiedEvent",
            [UserEventSubscriber::class, "handleEmailVerified"]
        );
    }
}
