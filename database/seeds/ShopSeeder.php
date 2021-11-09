<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Shop;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1 ; $i <= 10 ; $i++){
            Shop::create([
                "title" => $faker->name,
                "description"  => $faker->paragraph,
                "email"    => $faker->email,
                "phone"    => $faker->phoneNumber,
                "country"   => $faker->country
            ]);
        }
    }
    }
