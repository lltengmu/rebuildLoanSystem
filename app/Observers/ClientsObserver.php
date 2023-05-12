<?php

namespace App\Observers;

use App\Models\Client;
use Illuminate\Support\Facades\Crypt;

class ClientsObserver
{
    /**
     * Handle the Client "created" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function created(Client $client)
    {
        $data = $client->toArray();
        $client->sys_id = Crypt::encrypt($data["id"]);
        $client->create_datetime = date("Y-m-d H:m:s");
        $client->save();
    }
}
