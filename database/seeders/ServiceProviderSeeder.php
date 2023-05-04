<?php

namespace Database\Seeders;

use App\Models\Individuals;
use App\Models\ServiceProvider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class ServiceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all = ServiceProvider::factory(5)->create();
        $serviceProvider = ServiceProvider::first();
        $serviceProvider->email ="sp@qq.com";
        $serviceProvider->save();
        foreach($all as $item){
            $item->sys_id = Crypt::encrypt($item->id);
            $item->save();
        }
    }
}
