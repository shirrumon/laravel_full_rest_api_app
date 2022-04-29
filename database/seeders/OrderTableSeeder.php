<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 15; $i++){
            Order::create([
                'created_date' => $faker->date,
                'update_date' => $faker->date,
                'buyer_id' => $faker->numerify,
                'order_sum' => $faker->numerify,
                'order_status' => $faker->paragraph
            ]);
        }
    }
}
