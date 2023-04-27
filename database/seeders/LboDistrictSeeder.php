<?php

namespace Database\Seeders;

use App\Models\LboDistrict;
use Illuminate\Database\Seeder;

class LboDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'label_tc' => '港島','label_en' => "Hong Kong Island","value" => "Hong Kong Island" ],
            [ 'label_tc' => '九龍','label_en' => "Kowloon","value" => "Kowloon" ],
            [ 'label_tc' => '新界','label_en' => "New Territories","value" => "New Territories" ],
        ];
        foreach($data as $item):
            LboDistrict::updateOrCreate($item);
        endforeach;
    }
}
