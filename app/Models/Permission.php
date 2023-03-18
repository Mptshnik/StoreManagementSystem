<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;


    public static string $CREATE_SLUG = "create-permission";
    public static string $EDIT_SLUG = "edit-permission";
    public static string $DELETE_SLUG = "delete-permission";
    public static string $VIEW_ALL_SLUG = "view-permissions";
    public static string $SHOW_SLUG = "show-permission";


    public static function getPermissionByRouteName(string $name)
    {
        $data = self::getPermissionRouteNames();
        foreach ($data as $index => $value){
            if($index == $name)
            {
                return $value;
            }
        }

        return null;
    }

    private static function getPermissionRouteNames()
    {
        $data = [
            'permissions.index' => Permission::$VIEW_ALL_SLUG,
            'permissions.show' => Permission::$SHOW_SLUG,
            'permissions.edit' => Permission::$EDIT_SLUG,
            'permissions.create' => Permission::$CREATE_SLUG,

            'users.index' => User::$VIEW_ALL_SLUG,
            'users.show' => User::$SHOW_SLUG,
            'users.edit' => User::$EDIT_SLUG,
            'users.create' => User::$CREATE_SLUG,

            'categories.index' => Category::$VIEW_ALL_SLUG,
            'categories.show' => Category::$SHOW_SLUG,
            'categories.edit' => Category::$EDIT_SLUG,
            'categories.create' => Category::$CREATE_SLUG,

            'customers.index' => Customer::$VIEW_ALL_SLUG,
            'customers.show' => Customer::$SHOW_SLUG,
            'customers.edit' => Customer::$EDIT_SLUG,
            'customers.create' => Customer::$CREATE_SLUG,

            'items.index' => Item::$VIEW_ALL_SLUG,
            'items.show' => Item::$SHOW_SLUG,
            'items.edit' => Item::$EDIT_SLUG,
            'items.create' => Item::$CREATE_SLUG,

            'manufacturers.index' => Manufacturer::$VIEW_ALL_SLUG,
            'manufacturers.show' => Manufacturer::$SHOW_SLUG,
            'manufacturers.edit' => Manufacturer::$EDIT_SLUG,
            'manufacturers.create' => Manufacturer::$CREATE_SLUG,

            'orders.index' => Order::$VIEW_ALL_SLUG,
            'orders.show' => Order::$SHOW_SLUG,
            'orders.edit' => Order::$EDIT_SLUG,
            'orders.create' => Order::$CREATE_SLUG,

            'promotion.index' => Promotion::$VIEW_ALL_SLUG,
            'promotions.show' => Promotion::$SHOW_SLUG,
            'promotions.edit' => Promotion::$EDIT_SLUG,
            'promotions.create' => Promotion::$CREATE_SLUG,

            'promotion-types.index' => PromotionType::$VIEW_ALL_SLUG,
            'promotion-types.show' => PromotionType::$SHOW_SLUG,
            'promotion-types.edit' => PromotionType::$EDIT_SLUG,
            'promotion-types.create' => PromotionType::$CREATE_SLUG,

            'providers.index' => Provider::$VIEW_ALL_SLUG,
            'providers.show' => Provider::$SHOW_SLUG,
            'providers.edit' => Provider::$EDIT_SLUG,
            'providers.create' => Provider::$CREATE_SLUG,

            'roles.index' => Role::$VIEW_ALL_SLUG,
            'roles.show' => Role::$SHOW_SLUG,
            'roles.edit' => Role::$EDIT_SLUG,
            'roles.create' => Role::$CREATE_SLUG,
        ];

        return $data;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'permissions_users');
    }
}
