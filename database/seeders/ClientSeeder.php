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
        Client::withoutEvents(function () {
            Client::factory(5)->create();
            $client = Client::first();
            $client->email = 'client@qq.com';
            $client->status = 1;
            $client->save();
        });
    }
}
