<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "image" => $this->faker->imageUrl(150, 150, "human", true, "men"),
            "nik" => $this->faker->unique()->regexify("[0-9]{10}"),
            "phone" => $this->faker->phoneNumber(),
            "address" => $this->faker->address(),
        ];
    }
}
