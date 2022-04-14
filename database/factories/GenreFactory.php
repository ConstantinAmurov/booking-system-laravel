<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $styleValues = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
        
        return [
            'name' => Str::random(10),
            'style' => $this->faker->randomElement($styleValues),
        ];
    }
}
