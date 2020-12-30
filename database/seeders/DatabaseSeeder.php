<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
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
        $this->call([
            CitySeeder::class,
            CategorySeeder::class,
            AttributeSeeder::class,
            ProductStatusSeeder::class,
            BannerSeeder::class,
            OrderStatusSeeder::class,
            UserSeeder::class,
            StoreSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
