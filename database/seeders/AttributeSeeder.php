<?php

namespace Database\Seeders;

use App\Models\Attribute as ModelsAttribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsAttribute::create([
            'name' => 'Цвет',
            'is_active' => '1',
            'category_id' => '1',
        ]);
    }
}
