<?php

namespace Database\Seeders;

use App\Models\LboLoanPurpose;
use Illuminate\Database\Seeder;

class LboLoanPurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ "label_tc" => "一般個人開支","label_en" => "General personal expenditure", ],
            [ "label_tc" => "裝修","label_en" => "Decoration", ],
            [ "label_tc" => "進修","label_en" => "Further education", ],
        ];
        foreach($data as $item):
            LboLoanPurpose::updateOrCreate($item);
        endforeach;
    }
}
