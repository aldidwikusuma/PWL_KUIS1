<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => implode(" ", $this->faker->unique()->words(2)),
            "description" => $this->faker->sentence(5),
            "image" => $this->faker->imageUrl(150, 150, "nature", true, "montain"),
            "stok" => $this->faker->numberBetween(3, 20),
            "price" => $this->faker->numberBetween(10000, 100000)
        ];
    }
}
