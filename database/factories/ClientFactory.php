<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name'   => $this->faker->lastName(),
            'appellation' => mt_rand(0, 4),
            'password'   => sha1(123456),
            'HKID'       => mt_rand(0, 100000),
            'date_of_birth' => $this->faker->date(),
            'marital_status' => mt_rand(0,10),
            'mobile'     => $this->faker->phoneNumber(),
            'email'      => $this->faker->email(),
            'nationality' => $this->faker->country(),
            'area'       => $this->faker->city(),
            'addres'     => $this->faker->address(),
            'addressOne'     => $this->faker->address(),
            'addressTwo'     => $this->faker->address(),
            'building'     => $this->faker->buildingNumber(),
            'floor'      => mt_rand(0, 10),
            'unit'       => mt_rand(0, 10),
            'job_status' => mt_rand(1, 2),
            'salary'     => mt_rand(0, 10000),
            'company_name' => $this->faker->company(),
            'company_contact' => $this->faker->phoneNumber(),
            'company_addres' => $this->faker->address(),
            'create_datetime' => date('Y-m-d h:i:s'),
            'update_datetime' => date('Y-m-d h:i:s'),
            'last_login_datetime' => date('Y-m-d h:i:s'),
            'status'   => mt_rand(0,1)
        ];
    }
}
