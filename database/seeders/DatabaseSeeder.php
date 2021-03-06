<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        $this->call([UserSeeder::class]);

        Category::create(['name' => 'Space', 'slug' => 'space']);
        Category::create(['name' => 'White', 'slug' => 'white']);
        Category::create(['name' => 'Work', 'slug' => 'work']);
        Post::factory(10)->create();
    }
}
