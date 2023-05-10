<?php

namespace Database\Seeders;

use App\Models\Cases;
use Illuminate\Database\Seeder;

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
    }
}
