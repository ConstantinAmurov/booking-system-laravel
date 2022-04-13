<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $genreValues = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        return [
            'title' => Str::random(10),
            'author' => Str::random(10),
            'genre' => $this->faker->randomElement($genreValues),
            'pages' =>  rand(100, 300),
            'in_stock' => rand(0, 300),
            'description' => Str::random(10),
            'released_at' => Carbon::now()->subMinutes(rand(1, 55)),
            'isbn' => Str::random(10),
        ];
    }
}


// return [
//     'name' => $this->faker->name(),
//     'email' => $this->faker->unique()->safeEmail(),
//     'email_verified_at' => now(),
//     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//     'remember_token' => Str::random(10),
// ];
// }