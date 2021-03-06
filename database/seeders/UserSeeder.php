<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
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
        $admin = Role::create([
            'name' => 'Administrator',
            'display_name' => 'Администратор', // optional
            'description' => 'Администратор владеет всеми правами на сайте кроме удаление администраторов', // optional
        ]);
        $owner = Role::create([
            'name' => 'Manager',
            'display_name' => 'Менеджер', // optional
            'description' => 'User is the owner of a given project', // optional
        ]);
        $Manager = Role::create([
            'name' => 'Moderator',
            'display_name' => 'Модератор', // optional
            'description' => 'User is allowed to manage and edit other users', // optional
        ]);
        $user_first = User::create([
            'name' => 'Fason',
            'phone' => '880180128',
            'email' => 'info@fason.tj',
            'address' => 'Рудаки 21/7',
            'city_id' => '1',
            'status' => '1',
            'password' => Hash::make('fason2020')
        ]);

        $user_first->attachRole($admin);
    }
}
