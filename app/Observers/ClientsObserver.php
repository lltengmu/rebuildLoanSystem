<?php

namespace App\Observers;

use App\Models\Client;
use App\Service\EmailService;
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
        //自动生成加密id
        $data = $client->toArray();
        $client->sys_id = Crypt::encrypt($data["id"]);
        $client->save();

        //自动发送邮箱
        app("email")->send($client->refresh());
    }
}
