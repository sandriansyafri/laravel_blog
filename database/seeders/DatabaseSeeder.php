<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class]);
        Category::create(['name' => 'Space', 'slug' => 'space']);
        Category::create(['name' => 'White', 'slug' => 'white']);
        Category::create(['name' => 'Work', 'slug' => 'work']);
        Post::factory(10)->create();
    }
}
