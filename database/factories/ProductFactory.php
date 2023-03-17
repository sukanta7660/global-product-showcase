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
        $discountEnable = $this->faker->boolean();
        return [
            'shop_id'           => $shop->id,
            'name'              => $this->faker->word,
            'quantity'          => rand(10, 100).' '.$this->faker->unique()->word,
            'price'             => $this->faker->randomElement([100, 200, 500]),
            'discount_enabled'  => $discountEnable,
            'discount_price'    => $discountEnable ? rand(100, 1000) : 0,
            'status'            => $this->faker->boolean()
        ];
    }
}
