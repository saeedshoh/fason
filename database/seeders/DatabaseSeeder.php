<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ItemsForPage;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Store;
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
            // CitySeeder::class,
            // // CategorySeeder::class,
            // // AttributeSeeder::class,
            // ProductStatusSeeder::class,
            // BannerSeeder::class,
            // OrderStatusSeeder::class,
            ProductSeeder::class,
            // UserSeeder::class,
            // StoreSeeder::class,
            // StoreEditSeeder::class,
            // // ProductSeeder::class,
            // MonetizationSeeder::class,
            // PermissionSeeder::class,
        ]);
        // Store::factory(2000)->create();
        // Product::factory(20)->create();
        // Order::factory(20)->create();
        // ItemsForPage::create([
        //     'qty' => 20
        // ]);
    }
}
