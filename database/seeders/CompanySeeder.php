<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'xxxx hk',
                'email' => 'bamk@gmail.com',
                'password' => sha1(123123),
                'contact' => '1234567',
                'create_datetime' => date('Y-m-d h:m:s'),
                'update_datetime' => date('Y-m-d h:m:s'),
            ],
            [
                'name' => 'HK bank',
                'email' => 'hkbamk@gmail.com',
                'password' => sha1(123123),
                'contact' => '1234567',
                'create_datetime' => date('Y-m-d h:i:s'),
                'update_datetime' => date('Y-m-d h:m:s'),
            ],
        ];
        foreach($data as $item):
            Company::updateOrCreate($item);
        endforeach;
    }
}
