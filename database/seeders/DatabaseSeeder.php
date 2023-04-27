<?php

namespace Database\Seeders;

use App\Models\LboLoanPurpose;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * 在seeders目录下可以在数据填充时，自定义一些想要的数据，
     * 在执行 php artisan db:seed 命令时之后databaseSeeder会被执行，所以需要在此处引入自定义数据填充类
     * @return void
     */
    public function run()
    {
        $this->call([
            CompanySeeder::class,
            ClientSeeder::class,
            ServiceProviderSeeder::class,
            CasesSeeder::class,
            GenderSeeder::class,
            LboAppllationsSeeder::class,
            LboCaseStatusSeeder::class,
            LboDeviceSeeder::class,
            LboDistrictSeeder::class,
            LboEmploymentSeeder::class,
            LboLoanPurposeSeeder::class,
            IndividualSeeder::class,
        ]);
    }
}
