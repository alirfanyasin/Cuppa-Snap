<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\MenuController as UserMenuController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use Illuminate\Support\Facades\Route;

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


Route::get('/not-found', function () {
    return view('pages.exception.404_not_found');
});
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register.post');
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('app/dashboard', [DashboardController::class, 'index'])->name('app.dashboard');
    Route::get('app/menu', [MenuController::class, 'index'])->name('app.menu');
    Route::get('app/menu/create', [MenuController::class, 'create'])->name('app.menu.create');
    Route::get('app/orders', [OrderController::class, 'index'])->name('app.orders');
});

Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('menu', [UserMenuController::class, 'index'])->name('menu');
    Route::get('orders', [UserOrderController::class, 'index'])->name('orders');
});
