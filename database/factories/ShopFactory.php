<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $shopName = $this->faker->unique()->words(2, true);
        $location = $this->faker->randomElement(Location::all());
        return [
            'name'          => $shopName,
            'slug'          => Str::slug($shopName),
            'rating'        => $this->faker->randomFloat(min: 1, max: 5),
            'about'         => $this->faker->words(50, asText: true),
            'cell'          => $this->faker->unique()->e164PhoneNumber,
            'email'         => $this->faker->email,
            'status'        => $this->faker->boolean,
            'location_id'   => $location->id
        ];
    }
}
