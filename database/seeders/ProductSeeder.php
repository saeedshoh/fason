<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Iphone XS MAX 256',
            'slug' => 'iphone-xs-max-256',
            'description' => 'Lorem Ipsum is simply dummy text of the printing a...',
            'image' => '/2020/12/5fd47be2396d0480x480.jpg',
            'category_id' => '1',
            'quantity' => '12',
            'price' => '16543',
            'product_status_id' => '1',
            'store_id' => '1',
        ]);
    }
}
