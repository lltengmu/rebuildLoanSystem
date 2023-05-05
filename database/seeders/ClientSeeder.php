<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all = Client::factory(20)->create();
        $client = Client::first();
        $client->email = 'client@qq.com';
        $client->status = 1;
        $client->save();
        foreach($all as $item){
            $item->sys_id = Crypt::encrypt($item->id);
            $item->save();
        }
    }
}
