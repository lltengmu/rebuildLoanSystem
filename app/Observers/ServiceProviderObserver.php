<?php

namespace App\Observers;

use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Crypt;

class ServiceProviderObserver
{
    /**
     * Handle the ServiceProvider "created" event.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return void
     */
    public function created(ServiceProvider $serviceProvider)
    {
        $data = $serviceProvider->toArray();
        $serviceProvider->sys_id = Crypt::encrypt($data["id"]);
        $serviceProvider->save();
    }

    /**
     * Handle the ServiceProvider "updated" event.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return void
     */
    public function updated(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Handle the ServiceProvider "deleted" event.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return void
     */
    public function deleted(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Handle the ServiceProvider "restored" event.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return void
     */
    public function restored(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Handle the ServiceProvider "force deleted" event.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return void
     */
    public function forceDeleted(ServiceProvider $serviceProvider)
    {
        //
    }
}
