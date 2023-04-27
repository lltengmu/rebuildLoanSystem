<?php

namespace Database\Seeders;

use App\Models\LboEmployment;
use Illuminate\Database\Seeder;

class LboEmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ "label_tc" => "受雇" ,"label_en" => "employed" ],
            [ "label_tc" => "自雇" ,"label_en" => "Self employed" ],
        ];
        foreach($data as $item):
            LboEmployment::updateOrCreate($item);
        endforeach;
    }
}
