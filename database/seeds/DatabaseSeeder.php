<?php

use Illuminate\Database\Seeder;
use App\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ShopSeeder::class);
        //$this->call(CategorySeeder::class);
        //$this->call(ProductSeeder::class);

    }
}
