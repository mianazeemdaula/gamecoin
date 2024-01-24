<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GamePackage>
 */
class GamePackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'game_asset_id' => $this->faker->numberBetween(1,12),
            'user_id' => $this->faker->numberBetween(2,6),
            'name' => $this->faker->word(),
            'image' => $this->faker->imageUrl(),
            'qty' => $this->faker->randomDigitNotNull(),
            'qty_sybmol' => $this->faker->randomElement(['k', 'm', 'b']),
            'price' => $this->faker->randomFloat(2,1,100),
            'offer_price' => $this->faker->randomFloat(2,1,100),
            'is_active' => $this->faker->randomElement([0, 1]),
        ];
    }
}
