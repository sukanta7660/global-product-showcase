<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $shop = $this->faker->randomElement(Shop::all());
        return [
            'name'      => $this->faker->word,
            'price'     => $this->faker->randomElement([100, 200, 500]),
            'shop_id'   => $shop->id
        ];
    }
}
