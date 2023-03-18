<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Manufacturer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public static string $CREATE_SLUG = "create-manufacturer";
    public static string $EDIT_SLUG = "edit-manufacturer";
    public static string $DELETE_SLUG = "delete-manufacturer";
    public static string $VIEW_ALL_SLUG = "view-manufacturers";
    public static string $SHOW_SLUG = "show-manufacturer";

  /*  public function slug(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value,
            set: fn($value) => Str::slug($this->name)
        );
    }*/

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

}
