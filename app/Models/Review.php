<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public static string $CREATE_SLUG = "create-review";
    public static string $EDIT_SLUG = "edit-review";
    public static string $DELETE_SLUG = "delete-review";
    public static string $VIEW_ALL_SLUG = "view-reviews";
    public static string $SHOW_SLUG = "show-review";

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }
}
