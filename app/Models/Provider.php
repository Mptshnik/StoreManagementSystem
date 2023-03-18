<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public static string $CREATE_SLUG = "create-provider";
    public static string $EDIT_SLUG = "edit-provider";
    public static string $DELETE_SLUG = "delete-provider";
    public static string $VIEW_ALL_SLUG = "view-providers";
    public static string $SHOW_SLUG = "show-promotion-provider";
}
