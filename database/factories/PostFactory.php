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
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(rand(1, 6)),
            'excerpt' => collect($this->faker->paragraphs(rand(3, 5)))
                ->map((function ($p) {
                    return "<p>" . $p . "</p>";
                }))->join(''),
            'body' => collect($this->faker->paragraphs(rand(10, 20)))
                ->map((function ($p) {
                    return "<p>" . $p . "</p>";
                }))->join('')
        ];
    }
}
