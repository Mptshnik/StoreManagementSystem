<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromotionType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public static string $CREATE_SLUG = "create-promotion-type";
    public static string $EDIT_SLUG = "edit-promotion-type";
    public static string $DELETE_SLUG = "delete-promotion-type";
    public static string $VIEW_ALL_SLUG = "view-promotion-types";
    public static string $SHOW_SLUG = "show-promotion-type";
}
