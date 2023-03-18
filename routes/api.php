<?php

use App\Http\Resources\CustomerResource;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([], function (){
    Route::get('/user', [\App\Http\Controllers\Api\CustomerController::class, 'getAuthorizedCustomer']);
    Route::apiResource('items.reviews', \App\Http\Controllers\Api\ReviewController::class)->shallow();
    Route::apiResource('items', \App\Http\Controllers\Api\ItemController::class);

    Route::get('/user/can-review/{item}', [\App\Http\Controllers\Api\ReviewController::class, 'canReview']);
});

Route::get('/test', function (){
    return response(['message' => 'test']);
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return response(['message' => 'email verified']);
})->middleware(['auth:sanctum', 'signed'])->name('verification.verify');

Route::middleware('guest')
    ->post('/register', \App\Http\Controllers\Api\RegistrationController::class);
Route::middleware('guest')
    ->post('/login', \App\Http\Controllers\Api\LoginController::class);


