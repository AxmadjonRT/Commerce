<?php

namespace Database\Factories;

use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'amount' => $this->faker->numberBetween(100, 2000),
            'clients_id' => Clients::pluck('id')[$this->faker->numberBetween(1,Clients::count()-1)]
        ];
    }
}
