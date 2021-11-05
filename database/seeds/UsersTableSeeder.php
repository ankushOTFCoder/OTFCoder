<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

         for ($i = 0; $i < 1000; $i++) {
            User::create([
                'firstname' => $faker->name,
                'lastname' => $faker->name,
                'email'   => $faker->email,
                'password' => 'admin123',
                'phone' => $faker->phoneNumber,
                'photo' => $faker->text(20),
            ]);
        }
    }
}
