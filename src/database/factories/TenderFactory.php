<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tender>
 */
class TenderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'external_code' => fake()->numberBetween(100000, 999999),
            'number' => fake()->numberBetween(10000, 99999),
            'status' => 'Открыто',
            'name' => fake()->realTextBetween(20, 254),
            'updated_at' => fake()->dateTime()
        ];
    }
}
