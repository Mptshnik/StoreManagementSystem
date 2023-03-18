<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public static string $CREATE_SLUG = "create-order";
    public static string $EDIT_SLUG = "edit-order";
    public static string $DELETE_SLUG = "delete-order";
    public static string $VIEW_ALL_SLUG = "view-orders";
    public static string $SHOW_SLUG = "show-order";
}
