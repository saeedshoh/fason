<?php

namespace Database\Seeders;

use App\Models\ProductStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_statuses')->insert([
            ['name' => 'Не активный'],
            ['name' => 'Активный'],
            ['name' => 'Отклонен']
        ]);
    }
}
