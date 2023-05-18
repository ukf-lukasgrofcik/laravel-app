<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\SuppliersController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\SettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [ DashboardController::class, 'index' ])->name('dashboard.index');

    // Settings
    Route::get('/settings/profile', [ SettingsController::class, 'profile' ])->name('settings.profile');
    Route::post('/settings/profile', [ SettingsController::class, 'profile_submit' ])->name('settings.profile.submit');
    Route::get('/settings/password', [ SettingsController::class, 'password' ])->name('settings.password');
    Route::post('/settings/password', [ SettingsController::class, 'password_submit' ])->name('settings.password.submit');

    // Users
    Route::resource('users', UsersController::class)->except([ 'show' ]);

    // Blog
    Route::resource('categories', CategoriesController::class)->except([ 'show' ]);
    Route::resource('tags', TagsController::class)->except([ 'show' ]);
    Route::resource('articles', ArticlesController::class)->except([ 'show' ]);

    // Supplies
    Route::resource('suppliers', SuppliersController::class)->except([ 'show' ]);
    Route::resource('orders', OrdersController::class)->except([ 'show' ]);

});

Route::get('/login', [ LoginController::class, 'form' ]);
Route::post('/login', [ LoginController::class, 'login' ])->name('login');
Route::post('/logout', [ LoginController::class, 'logout' ])->name('logout');
