<?php

namespace App\Models;

use App\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes, HasPermissions;

    protected $guarded = false;

    public static string $CREATE_SLUG = "create-role";
    public static string $EDIT_SLUG = "edit-role";
    public static string $DELETE_SLUG = "delete-role";
    public static string $VIEW_ALL_SLUG = "view-roles";
    public static string $SHOW_SLUG = "show-role";

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_roles');
    }
}
