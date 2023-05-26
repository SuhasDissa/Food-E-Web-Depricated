<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AdditivesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'e_code' => "",
            'title' => "",
            'info' => "",
            'e_type' => "",
            'halal_status' => 0,
            'favourite' => 0,
            'health_rating' => 0,
        ];
    }
}
