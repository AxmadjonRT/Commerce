<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone' => $this->faker->numberBetween(100000000000,999999999999),
            'name' => $this->faker->name(),
            'family' =>$this->faker->lastName()
        ];
    }
}
