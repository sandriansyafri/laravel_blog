<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
            $user = new User();
            $user->name = $faker->name();
            $user->username = $faker->userName();
            $user->email = $faker->email();
            $user->password = Hash::make('password');
            $user->save();
        endfor;
    }
}
