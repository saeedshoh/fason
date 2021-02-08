<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Другое',
            'slug' => 'drugoe',
            'icon' => '2020/12/5fd47be2396d0480x480.jpg',
            'is_active' => '1',
            'parent_id' => '0',
            'order_no' => 1
        ]);
    }
}
