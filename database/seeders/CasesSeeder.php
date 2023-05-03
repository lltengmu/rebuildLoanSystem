<?php

namespace Database\Seeders;

use App\Models\Cases;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class CasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all = Cases::factory(50)->create();
        //数据填充时生成加密id
        foreach($all as $item){
            $item->sys_id = Crypt::encrypt($item->id);
            $item->save();
        }
    }
}
