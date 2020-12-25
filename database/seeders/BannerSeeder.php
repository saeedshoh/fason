<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            ['image' => '2020/12/1L2etCthJnXEdDXfEt1HULY4KzFs4uLSNhD8dmfZ.png', 'type' => '1', 'position' => '2'],
            ['image' => '2020/12/cBISWOfErgS0NlMMXGZeQgQOiSuohUkg8td1EyRx.png', 'type' => '1', 'position' => '1'],
            ['image' => '2020/12/EhYhvo0EjCLCgX9TFb8fSjnrS13zYBsuLbodlYis.png', 'type' => '2', 'position' => '1'],
            ['image' => '2020/12/ZkVDOHg0uziBrE27kvUbiX6h6QoqdodmWd9VygmR.png', 'type' => '2', 'position' => '2']
        ]);
    }
}
