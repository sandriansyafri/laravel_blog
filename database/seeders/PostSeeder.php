<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) :
            Post::create([
                'title' => $faker->sentence(rand(1, 2)),
                'excerpt' => $faker->sentence(rand(1, 2)),
                'body' => $faker->sentence(rand(1, 2)),
            ]);
        endfor;
    }
}
