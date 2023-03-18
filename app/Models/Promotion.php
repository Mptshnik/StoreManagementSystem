<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public static string $CREATE_SLUG = "create-promotion";
    public static string $EDIT_SLUG = "edit-promotion";
    public static string $DELETE_SLUG = "delete-promotion";
    public static string $VIEW_ALL_SLUG = "view-promotions";
    public static string $SHOW_SLUG = "show-promotion";
}
