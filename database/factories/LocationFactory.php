<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->address;
        return [
            'name'      => $name,
            'slug'      => Str::slug($name),
            'latitude'  => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'status'    => $this->faker->boolean
        ];
    }
}
