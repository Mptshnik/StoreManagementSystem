<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\Manufacturer;
use App\Models\Order;
use App\Models\Permission;
use App\Models\Promotion;
use App\Models\PromotionType;
use App\Models\Provider;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            ['name' => 'Добавить категорию товара', 'slug' => Category::$CREATE_SLUG],
            ['name' => 'Изменить категорию товара', 'slug' => Category::$EDIT_SLUG],
            ['name' => 'Удалить категорию товара', 'slug' => Category::$DELETE_SLUG],
            ['name' => 'Просмотреть категорию товара', 'slug' => Category::$SHOW_SLUG],
            ['name' => 'Просмотреть список категорий товаров', 'slug' => Category::$VIEW_ALL_SLUG],

            ['name' => 'Добавить товар', 'slug' => Item::$CREATE_SLUG],
            ['name' => 'Изменить товар', 'slug' => Item::$EDIT_SLUG],
            ['name' => 'Удалить товар', 'slug' => Item::$DELETE_SLUG],
            ['name' => 'Просмотреть товар', 'slug' => Item::$SHOW_SLUG],
            ['name' => 'Просмотреть список товаров', 'slug' => Item::$VIEW_ALL_SLUG],

            ['name' => 'Добавить поставщика', 'slug' => Provider::$CREATE_SLUG],
            ['name' => 'Изменить поставщика', 'slug' => Provider::$EDIT_SLUG],
            ['name' => 'Удалить поставщика', 'slug' => Provider::$DELETE_SLUG],
            ['name' => 'Просмотреть поставщика', 'slug' => Provider::$SHOW_SLUG],
            ['name' => 'Просмотреть список поставщиков', 'slug' => Provider::$VIEW_ALL_SLUG],

            ['name' => 'Добавить производителя', 'slug' => Manufacturer::$CREATE_SLUG],
            ['name' => 'Изменить производителя', 'slug' => Manufacturer::$EDIT_SLUG],
            ['name' => 'Удалить производителя', 'slug' => Manufacturer::$DELETE_SLUG],
            ['name' => 'Просмотреть производителя', 'slug' => Manufacturer::$SHOW_SLUG],
            ['name' => 'Просмотреть список производителей', 'slug' => Manufacturer::$VIEW_ALL_SLUG],

            ['name' => 'Добавить акцию', 'slug' => Promotion::$CREATE_SLUG],
            ['name' => 'Изменить акцию', 'slug' => Promotion::$EDIT_SLUG],
            ['name' => 'Удалить акцию', 'slug' => Promotion::$DELETE_SLUG],
            ['name' => 'Просмотреть акцию', 'slug' => Promotion::$SHOW_SLUG],
            ['name' => 'Просмотреть список акций', 'slug' => Promotion::$VIEW_ALL_SLUG],

            ['name' => 'Добавить категорию акции', 'slug' => PromotionType::$CREATE_SLUG],
            ['name' => 'Изменить категорию акции', 'slug' => PromotionType::$EDIT_SLUG],
            ['name' => 'Удалить категорию акции', 'slug' => PromotionType::$DELETE_SLUG],
            ['name' => 'Просмотреть категорию акции', 'slug' => PromotionType::$SHOW_SLUG],
            ['name' => 'Просмотреть список категорий акций', 'slug' => PromotionType::$VIEW_ALL_SLUG],

            ['name' => 'Создать заказ', 'slug' => Order::$CREATE_SLUG],
            ['name' => 'Изменить заказ', 'slug' => Order::$EDIT_SLUG],
            ['name' => 'Удалить заказ', 'slug' => Order::$DELETE_SLUG],
            ['name' => 'Просмотреть заказ', 'slug' => Order::$SHOW_SLUG],
            ['name' => 'Просмотреть список заказов', 'slug' => Order::$VIEW_ALL_SLUG],

            ['name' => 'Создать пользователя', 'slug' => User::$CREATE_SLUG],
            ['name' => 'Изменить пользователя', 'slug' => User::$EDIT_SLUG],
            ['name' => 'Удалить пользователя', 'slug' => User::$DELETE_SLUG],
            ['name' => 'Просмотреть пользователя', 'slug' => User::$SHOW_SLUG],
            ['name' => 'Просмотреть список пользователей', 'slug' => User::$VIEW_ALL_SLUG],

            ['name' => 'Создать роль пользователя', 'slug' => Role::$CREATE_SLUG],
            ['name' => 'Изменить роль пользователя', 'slug' => Role::$EDIT_SLUG],
            ['name' => 'Удалить роль пользователя', 'slug' => Role::$DELETE_SLUG],
            ['name' => 'Просмотреть роль пользователя', 'slug' => Role::$SHOW_SLUG],
            ['name' => 'Просмотреть список ролей пользователей', 'slug' => Role::$VIEW_ALL_SLUG],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
