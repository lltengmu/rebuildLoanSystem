<?php

namespace Database\Seeders;

use App\Models\Individuals;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

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
        //数据填充时生成加密id
        foreach($all as $item){
            $item->sys_id = Crypt::encrypt($item->id);
            $item->save();
        }
    }
}
