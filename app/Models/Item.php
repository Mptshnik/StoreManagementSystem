<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;
    public static string $CREATE_SLUG = "create-item";
    public static string $EDIT_SLUG = "edit-item";
    public static string $DELETE_SLUG = "delete-item";
    public static string $VIEW_ALL_SLUG = "view-items";
    public static string $SHOW_SLUG = "show-item";

    public function slug() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => Str::slug($value),
        );
    }

    public function rating() : Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->getRating(),
        );
    }

    private function getRating()
    {
        $reviews_count = $this->reviews()->count();
        if($reviews_count == 0)
        {
            return 0;
        }

        return $this->reviews()->sum('rating') / $reviews_count;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class );
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'items_categories');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
