<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::withoutEvents(function () {
            User::factory(20)->create(); //使用数据填充创建20条测试数据
            $user = User::first();
            $user->email = 'admin@qq.com';
            $user->name = '向军大叔';
            $user->save();
        });
    }
}
