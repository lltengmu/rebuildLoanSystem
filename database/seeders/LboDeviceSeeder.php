<?php

namespace Database\Seeders;

use App\Models\LboDevice;
use Illuminate\Database\Seeder;

class LboDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ "shortt_code" => "IOS",],
            [ "shortt_code" => "AOS",],
        ];
        foreach($data as $item):
            LboDevice::updateOrCreate($item);
        endforeach;
    }
}
