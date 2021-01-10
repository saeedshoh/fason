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
            'name' => 'Iphone XS MAX 32',
            'slug' => 'iphone-xs-max-32',
            'description' => 'Lorem Ipsum is simply dummy text of the printing a...',
            'image' => '/2020/12/5fd47be2396d0480x480.jpg',
            'gallery' => '["2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg"]',
            'category_id' => '1',
            'quantity' => '10',
            'price' => '100',
            'product_status_id' => '1',
            'store_id' => '1',
        ]);
        Product::create([
            'name' => 'Iphone XS MAX 64',
            'slug' => 'iphone-xs-max-64',
            'description' => 'Lorem Ipsum is simply dummy text of the printing a...',
            'image' => '/2020/12/5fd47be2396d0480x480.jpg',
            'gallery' => '["2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg"]',
            'category_id' => '1',
            'quantity' => '20',
            'price' => '200',
            'product_status_id' => '1',
            'store_id' => '1',
        ]);
        Product::create([
            'name' => 'Iphone XS MAX 128',
            'slug' => 'iphone-xs-max-128',
            'description' => 'Lorem Ipsum is simply dummy text of the printing a...',
            'image' => '/2020/12/5fd47be2396d0480x480.jpg',
            'gallery' => '["2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg"]',
            'category_id' => '1',
            'quantity' => '30',
            'price' => '300',
            'product_status_id' => '1',
            'store_id' => '1',
        ]);
        Product::create([
            'name' => 'Iphone XS MAX 256',
            'slug' => 'iphone-xs-max-256',
            'description' => 'Lorem Ipsum is simply dummy text of the printing a...',
            'image' => '/2020/12/5fd47be2396d0480x480.jpg',
            'gallery' => '["2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg"]',
            'category_id' => '1',
            'quantity' => '40',
            'price' => '400',
            'product_status_id' => '1',
            'store_id' => '1',
        ]);
        Product::create([
            'name' => 'Iphone XS MAX 512',
            'slug' => 'iphone-xs-max-512',
            'description' => 'Lorem Ipsum is simply dummy text of the printing a...',
            'image' => '/2020/12/5fd47be2396d0480x480.jpg',
            'gallery' => '["2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg","2020/12/5fd47be2396d0480x480.jpg"]',
            'category_id' => '1',
            'quantity' => '50',
            'price' => '500',
            'product_status_id' => '1',
            'store_id' => '1',
        ]);
    }
}
