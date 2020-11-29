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
            'image' => '1324897',
            'category_id' => '1',
            'quantity' => '12',
            'price' => '16543',
            'attribute_id' => '1',
            'product_status_id' => '1',
            'store_id' => '1',
            'gallery' => 'Iphone XS MAX 256',
        ]);
    }
}
