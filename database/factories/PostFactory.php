<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'category_id' => rand(1, 3),
            'title' => $this->faker->sentence(rand(1, 4)),
            'slug' => $this->faker->slug(rand(1, 3)),
            'excerpt' => $this->faker->paragraph(),
            'body' => $this->faker->paragraph(rand(5, 10)),

        ];
    }
}
