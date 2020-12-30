<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\OrderStatus;
use App\Models\Product;
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
        // UserSeeder::class;
        // Category::factory(10)->create();
        // AttributeSeeder::class;
        // CitySeeder::class;
        // ProductStatusSeeder::class;
        // StoreSeeder::class;
        Product::factory(40)->create();
        // BannerSeeder::class;
        // OrderStatusSeeder::class;
    }
}
