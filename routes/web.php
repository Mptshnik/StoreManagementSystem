<?php

use App\Http\Controllers\Web\AuthorizationController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\ItemController;
use App\Http\Controllers\Web\ManufacturerController;
use App\Http\Controllers\Web\ProviderController;
use App\Http\Controllers\Web\RoleController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test', function () {
    return view('test');
});

Route::get('/login', [AuthorizationController::class, 'index'])->name('login');
Route::post('/login', [AuthorizationController::class, 'login'])->name('authorize');

Route::middleware(['auth', 'permission'])->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::post('/logout', [AuthorizationController::class, 'logout'])
        ->name('logout');

    Route::post('/users/{user}/reset-password', [UserController::class, 'resetPassword'])
        ->name('users.reset-password');

    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('providers', ProviderController::class);
    Route::resource('manufacturers', ManufacturerController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('items', ItemController::class);
});

