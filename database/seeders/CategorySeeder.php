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
            'icon' => 'img/2020/11/rMtrTPdv9thzYXoZ69SJISUATJTO4f67EWc0iJti.svg',
            'is_active' => '1',
            'parent_id' => '0',
        ]);
    }
}
