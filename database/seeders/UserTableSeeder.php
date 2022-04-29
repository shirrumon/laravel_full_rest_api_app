<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
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

        $password = Hash::make('root');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'created_date' => $faker->date,
            'update_date' => $faker->date,
            'count_of_orders' => $faker->numerify,
            'password' => $password,
        ]);

        for($i = 0; $i < 5; $i++){
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'created_date' => $faker->date,
                'update_date' => $faker->date,
                'count_of_orders' => $faker->numerify,
                'password' => $password,
            ]);
        }
    }
}
