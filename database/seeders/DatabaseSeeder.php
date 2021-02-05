<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\OrderStatus;
use App\Models\Permission;
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
        Category::factory(20)->create();
        Product::factory(20)->create();
        // $this->call([
        //     // CitySeeder::class,
        //     // CategorySeeder::class,
        //     // AttributeSeeder::class,
        //     // ProductStatusSeeder::class,
        //     // BannerSeeder::class,
        //     // OrderStatusSeeder::class,
        //     // UserSeeder::class,
        //     // StoreSeeder::class,
        //     // ProductSeeder::class,
        //     // MonetizationSeeder::class,
        //     // PermissionSeeder::class,
        // ]);
        // Product::factory(50)->create();
    }
}
