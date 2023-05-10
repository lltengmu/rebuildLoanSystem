<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IndividualsFactory extends Factory
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
            'mobile'     => $this->faker->phoneNumber(),
            'email'      => $this->faker->email(),
            'contact'    =>$this->faker->phoneNumber(),
            'status'     => mt_rand(0,1),
            'password'   => sha1('123456')
        ];
    }
}
