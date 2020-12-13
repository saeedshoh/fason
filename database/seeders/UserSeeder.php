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

        $crud_media = Permission::create([
            'name' => 'CRUD',
            'display_name' => 'CRUD', // optional
            'description' => 'Может создавать читать изменять удалить', // optional
        ]);
        $user_first = User::create([
            'name' => 'Fason',
            'phone' => '880180128',
            'email' => 'info@fason.tj',
            'password' => Hash::make('fason2020')
        ]);

        $user_first->attachRole($admin);
        $admin->attachPermission($crud_media);
    }
}
