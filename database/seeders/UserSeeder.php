<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fason',
            'phone' => '880180128',
            'email' => 'info@fason.tj',
            'password' => Hash::make('fason2020')
        ]);
    }
}
