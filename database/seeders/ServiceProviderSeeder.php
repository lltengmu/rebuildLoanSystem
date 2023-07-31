<?php

namespace Database\Seeders;

use App\Models\Individuals;
use App\Models\ServiceProvider;
use Illuminate\Database\Seeder;

class ServiceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceProvider::withoutEvents(function () {
            $all = ServiceProvider::factory(5)->create();
            $serviceProvider = ServiceProvider::first();
            $serviceProvider->email = "sp@qq.com";
            $serviceProvider->save();
        });
    }
}
