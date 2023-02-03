<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = fake('en_US');

        return [
            'title' => $faker->text(35),
            'content' => $faker->realTextBetween(50, 300),
            'user_id' => $faker->numberBetween(1, 4),
        ];
    }
}