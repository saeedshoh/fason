<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StoreEdit;

class StoreEditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        StoreEdit::create([
            'name' => 'Mado',
            'store_id' => '1',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'address' => 'Dehoti 21/7',
            'avatar' => 'theme/itpark.png',
            'cover' => 'theme/yellowbanner.png',
            'city_id' => '1',
            'is_active' => '1',
            'is_moderation' => '0',
        ]);
    }
}
