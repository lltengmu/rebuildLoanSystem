<?php

namespace Database\Seeders;

use App\Models\Individuals;
use Illuminate\Database\Seeder;

class IndividualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all = Individuals::factory(20)->create();
        $client = Individuals::first();
        $client->email = 'individual@qq.com';
        $client->save();
    }
}
