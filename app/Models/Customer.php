<?php

namespace App\Models;


use App\Notifications\EmailVerificationNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, HasFactory, SoftDeletes;

    protected $guarded = false;

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerificationNotification());
    }

    public static string $CREATE_SLUG = "create-customer";
    public static string $EDIT_SLUG = "edit-customer";
    public static string $DELETE_SLUG = "delete-customer";
    public static string $VIEW_ALL_SLUG = "view-customers";
    public static string $SHOW_SLUG = "show-customer";
}
