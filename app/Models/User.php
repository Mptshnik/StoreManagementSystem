<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasPermissions;
use App\Traits\HasRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles, HasPermissions;


    protected $guarded = false;

    public static string $CREATE_SLUG = "create-user";
    public static string $EDIT_SLUG = "edit-user";
    public static string $DELETE_SLUG = "delete-user";
    public static string $VIEW_ALL_SLUG = "view-users";
    public static string $SHOW_SLUG = "show-user";

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions_users');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'login';
    }

    public function getRouteKey()
    {
        return $this->login;
    }

    public function password() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => Hash::make($value),
        );
    }
}
