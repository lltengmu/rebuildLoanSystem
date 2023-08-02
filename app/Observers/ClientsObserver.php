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

        //获取场景分类
        $category = null;
        
        if(session("email") == "" || session("_user_info.identify") == "clients")$category = "client_create";
        if(session("_user_info.identify") == "individual")$category = "admin_add_loan";
        if(session("_user_info.identify") == "sp")$category = "agreed_loan";
        //发送邮件通知
        if(env("ENABLE_EMAIL_SERVICE"))app("email")->send($client,$category);
    }
}
