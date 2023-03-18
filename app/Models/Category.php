<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public static string $CREATE_SLUG = "create-item-category";
    public static string $EDIT_SLUG = "edit-item-category";
    public static string $DELETE_SLUG = "delete-item-category";
    public static string $VIEW_ALL_SLUG = "view-item-categories";
    public static string $SHOW_SLUG = "show-item-category";

    public function items()
    {
        return $this->belongsToMany(Item::class, 'items_categories');
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
