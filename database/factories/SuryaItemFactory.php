<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuryaItem>
 */
class SuryaItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
               return [
            'category_id'   => 1, // pastikan ada category id 1 ya
            'name'          => $this->faker->words(3, true),
            'brand'         => $this->faker->randomElement(['Eiger', 'Consina', 'NatureHike', 'Rei']),
            'rental_price'  => $this->faker->numberBetween(10000, 50000),
            'stock'         => $this->faker->numberBetween(5, 20),
            'description'   => $this->faker->sentence(),
            'image'         => 'https://source.unsplash.com/featured/?campinggear' . $this->faker->numberBetween(1, 100),
        ];
    }
}
