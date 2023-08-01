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
}
