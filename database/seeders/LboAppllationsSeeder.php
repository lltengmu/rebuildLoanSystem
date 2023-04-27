<?php

namespace Database\Seeders;

use App\Models\LboAppellations;
use Illuminate\Database\Seeder;

class LboAppllationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'label_tc' => '小姐','label_en' => 'Miss','value' => "Miss" ],
            [ 'label_tc' => '女士','label_en' => 'Ms.','value' => "Mis." ],
            [ 'label_tc' => '先生','label_en' => 'Mr.','value' => "Mr." ],
            [ 'label_tc' => '太太','label_en' => 'Mrs.','value' => "Mrs." ],
        ];
        foreach($data as $item):
            LboAppellations::updateOrCreate($item);
        endforeach;
    }
}
