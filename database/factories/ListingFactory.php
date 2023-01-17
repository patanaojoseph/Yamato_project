<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'beds' => fake()->numberBetween(1, 6),
            'baths' => fake()->numberBetween(1, 6),
            'kitchen' => fake()->numberBetween(1, 3),
            'dinning' => fake()->numberBetween(1, 2),
            'area' => fake()->numberBetween(30, 500),

            'city' => fake()->city(),
            'code' => fake()->postcode(),
            'street' => fake()->streetName(),
            'street_no' => fake()->numberBetween(10, 200),


            'price' => fake()->numberBetween(100_000, 5_000_000)
        ];
    }
}
