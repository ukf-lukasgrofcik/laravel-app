<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;

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
});

Route::get('/login', [ LoginController::class, 'form' ]);
Route::post('/login', [ LoginController::class, 'login' ])->name('login');
Route::post('/logout', [ LoginController::class, 'logout' ])->name('logout');
