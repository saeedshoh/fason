<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ItemsForPage;
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
            MonetizationSeeder::class,
            PermissionSeeder::class,
        ]);
        Category::factory(20)->create();
        Product::factory(20)->create();

        ItemsForPage::create([
            'qty' => 20
        ]);
    }
}
