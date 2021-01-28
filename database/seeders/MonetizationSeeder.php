<?php

namespace Database\Seeders;

use App\Models\Monetization;
use Illuminate\Database\Seeder;

class MonetizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Monetization::create([
            'min'       => 0,
            'max'       => 100,
            'margin'    => 5,
            'added_val' => 5,
        ]);
        Monetization::create([
            'min'       => 100,
            'max'       => 500,
            'margin'    => 7.5,
            'added_val' => 5,
        ]);
        Monetization::create([
            'min'       => 500,
            'max'       => 1000,
            'margin'    => 10,
            'added_val' => 5,
        ]);
        Monetization::create([
            'min'       => 1000,
            'max'       => 5000,
            'margin'    => 12.5,
            'added_val' => 5,
        ]);
        Monetization::create([
            'min'       => 5000,
            'max'       => 50000,
            'margin'    => 15,
            'added_val' => 5,
        ]);
    }
}
