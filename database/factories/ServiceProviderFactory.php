<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceProviderFactory extends Factory
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
            'email'      => $this->faker->email(),
            'password'   => sha1(123456),
            'mobile'     => $this->faker->phoneNumber(),
            'company_id' => mt_rand(1,2),
            "create_datetime" =>date("Y-m-d H:m:s")
        ];
    }
}
