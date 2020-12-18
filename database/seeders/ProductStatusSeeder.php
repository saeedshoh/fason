<?php

namespace Database\Seeders;

use App\Models\ProductStatus;
use Illuminate\Database\Seeder;

class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductStatus::create(['name' => 'Активный']);
        ProductStatus::create(['name' => 'Не активный']);
        ProductStatus::create(['name' => 'Не Отклонен']);
    }
}
