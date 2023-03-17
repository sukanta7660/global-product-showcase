<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $shop = $this->faker->randomElement(Shop::whereStatus(1)->get());
        return [
            'shop_id'       => $shop->id,
            'coupon_code'   => $this->faker->unique()->word,
            'coupon_price'  => $this->faker->randomElement([10, 100, 200]),
            'from'          => $this->faker->date('Y-m-d'),
            'to'            => $this->faker->date('Y-m-d'),
            'status'        => $this->faker->boolean
        ];
    }
}
