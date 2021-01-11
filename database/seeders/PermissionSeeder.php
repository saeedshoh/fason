<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'create-categories',
                'display_name' => 'Создание категории',
                'description' => 'Создание новых категории',
            ],
            [
                'name' => 'read-categories',
                'display_name' => 'Просмотр категории',
                'description' => 'Просмотр новых категории',
            ],
            [
                'name' => 'update-categories',
                'display_name' => 'Изменение категории',
                'description' => 'Изменение новых категории',
            ],
            [
                'name' => 'delete-categories',
                'display_name' => 'Удаление категории',
                'description' => 'Удаление новых категории',
            ],
            [
                'name' => 'create-attributes',
                'display_name' => 'Создание аттрибутов',
                'description' => 'Создание новых аттрибутов',
            ],
            [
                'name' => 'read-attributes',
                'display_name' => 'Просмотр аттрибутов',
                'description' => 'Просмотр новых аттрибутов',
            ],
            [
                'name' => 'update-attributes',
                'display_name' => 'Изменение аттрибутов',
                'description' => 'Изменение новых аттрибутов',
            ],
            [
                'name' => 'delete-attributes',
                'display_name' => 'Удаление аттрибутов',
                'description' => 'Удаление новых аттрибутов',
            ],
            [
                'name' => 'create-products',
                'display_name' => 'Создание товаров',
                'description' => 'Создание новых товаров',
            ],
            [
                'name' => 'read-products',
                'display_name' => 'Просмотр товаров',
                'description' => 'Просмотр новых товаров',
            ],
            [
                'name' => 'update-products',
                'display_name' => 'Изменение товаров',
                'description' => 'Изменение новых товаров',
            ],
            [
                'name' => 'delete-products',
                'display_name' => 'Удаление товаров',
                'description' => 'Удаление новых товаров',
            ],
            [
                'name' => 'read-orders',
                'display_name' => 'Просмотр заказов',
                'description' => 'Просмотр новых пользователей',
            ],
            [
                'name' => 'delete-orders',
                'display_name' => 'Удаление заказов',
                'description' => 'Удаление новых заказов',
            ],
            [
                'name' => 'create-employee',
                'display_name' => 'Создание сотрудников',
                'description' => 'Создание новых сотрудников',
            ],
            [
                'name' => 'read-employee',
                'display_name' => 'Просмотр сотрудников',
                'description' => 'Просмотр новых пользователей',
            ],
            [
                'name' => 'update-employee',
                'display_name' => 'Изменение сотрудников',
                'description' => 'Изменение новых сотрудников',
            ],
            [
                'name' => 'delete-employee',
                'display_name' => 'Удаление сотрудников',
                'description' => 'Удаление новых сотрудников',
            ],
            [
                'name' => 'read-users',
                'display_name' => 'Просмотр пользователей',
                'description' => 'Просмотр новых пользователей',
            ],
            [
                'name' => 'delete-users',
                'display_name' => 'Удаление пользователей',
                'description' => 'Удаление новых пользователей',
            ],
            [
                'name' => 'create-stores',
                'display_name' => 'Создание магазинов',
                'description' => 'Создание новых магазинов',
            ],
            [
                'name' => 'read-stores',
                'display_name' => 'Просмотр магазина',
                'description' => 'Просмотр новых магазинов',
            ],
            [
                'name' => 'update-stores',
                'display_name' => 'Изменение магазина',
                'description' => 'Изменение новых магазинов',
            ],
            [
                'name' => 'delete-stores',
                'display_name' => 'Удаление магазина',
                'description' => 'Удаление новых магазинов',
            ],
            [
                'name' => 'create-banners',
                'display_name' => 'Создание баннеров',
                'description' => 'Создание новых баннеров',
            ],
            [
                'name' => 'read-banners',
                'display_name' => 'Просмотр баннеров',
                'description' => 'Просмотр новых баннеров',
            ],
            [
                'name' => 'update-banners',
                'display_name' => 'Изменение баннеров',
                'description' => 'Изменение новых баннеров',
            ],
            [
                'name' => 'delete-banners',
                'display_name' => 'Удаление баннеров',
                'description' => 'Удаление новых баннеров',
            ],
            [
                'name' => 'create-monitization',
                'display_name' => 'Создание монитизации',
                'description' => 'Создание новых монитизаций',
            ],
            [
                'name' => 'read-monitization',
                'display_name' => 'Просмотр монитизации',
                'description' => 'Просмотр новых монитизаций',
            ],
            [
                'name' => 'update-monitization',
                'display_name' => 'Изменение монитизации',
                'description' => 'Изменение новых монитизаций',
            ],
            [
                'name' => 'delete-monitization',
                'display_name' => 'Удаление монитизации',
                'description' => 'Удаление новых монитизаций',
            ],
        ]);
    }
}
