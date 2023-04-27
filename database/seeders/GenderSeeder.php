<?php

namespace Database\Seeders;

use App\Models\LboGenders;
use Illuminate\Database\Seeder;
use LboGender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'label_tc' => '男','label_en' => 'man' ],
            [ 'label_tc' => '女','label_en' => 'women' ]
        ];
        foreach($data as $item):
            LboGenders::create($item);
        endforeach;
    }
}
