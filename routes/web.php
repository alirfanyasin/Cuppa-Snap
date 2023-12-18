<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TableNumberController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\MenuController as UserMenuController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\TransactionController as UserTransactionController;
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
    Route::get('/', function () {
        return view('pages.guest.landing-page');
    });

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register.post');

    // LOGIN WITH GOOGLE
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [GoogleController::class, 'handelGoogleCallback'])->name('auth.google.callback');
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('app/dashboard', [DashboardController::class, 'index'])->name('app.dashboard');
    Route::get('app/menu', [MenuController::class, 'index'])->name('app.menu');
    Route::get('app/menu/create', [MenuController::class, 'create'])->name('app.menu.create');
    Route::post('app/menu/store', [MenuController::class, 'store'])->name('app.menu.store');
    Route::get('app/menu/{id}/edit', [MenuController::class, 'edit'])->name('app.menu.edit');
    Route::put('app/menu/{id}/update', [MenuController::class, 'update'])->name('app.menu.update');
    Route::delete('app/menu/{id}/destroy', [MenuController::class, 'destroy'])->name('app.menu.destroy');
    Route::get('app/orders', [OrderController::class, 'index'])->name('app.orders');
    Route::get('app/orders/{code}/show', [OrderController::class, 'show'])->name('app.orders.show');
    Route::put('app/orders/{code}/confirmed', [OrderController::class, 'confirmed'])->name('app.orders.confirmed');
    Route::put('app/orders/{code}/rejected', [OrderController::class, 'rejected'])->name('app.orders.rejected');
    Route::delete('app/orders/{code}/destroy', [OrderController::class, 'destroy'])->name('app.orders.destroy');
    Route::get('app/table-number', [TableNumberController::class, 'index'])->name('app.table_number');
    Route::get('app/table-number/read', [TableNumberController::class, 'getData'])->name('app.table_number.read');
    Route::post('app/table-number/store', [TableNumberController::class, 'store'])->name('app.table_number.store');
    Route::post('app/table-number/{id}/update', [TableNumberController::class, 'update'])->name('app.table_number.update');
    Route::post('app/table-number/{id}/destroy', [TableNumberController::class, 'destroy'])->name('app.table_number.destroy');
    Route::get('app/transactions', [TransactionController::class, 'index'])->name('app.transactions');
    Route::get('app/transactions/{code}/show', [TransactionController::class, 'show'])->name('app.transactions.show');
});

Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('menu', [UserMenuController::class, 'index'])->name('menu');
    Route::post('menu/{id}/add-to-cart', [CartController::class, 'store'])->name('add_to_card');
    Route::get('carts', [CartController::class, 'index'])->name('carts');
    Route::get('carts/modal', [CartController::class, 'getModal'])->name('carts.modal');
    Route::delete('carts/{id}/destroy', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::post('/update-quantity/{itemId}', [CartController::class, 'updateQuantity'])->name('update-qty');
    Route::get('orders', [UserOrderController::class, 'index'])->name('orders');
    Route::post('order/store', [UserOrderController::class, 'store'])->name('order.store');
    Route::post('orders/update/status/{code}', [UserOrderController::class, 'updateStatus'])->name('orders.update.status');
    Route::get('orders/{code}/show', [UserOrderController::class, 'show'])->name('orders.show');
    Route::put('orders/{code}/confirmed', [UserOrderController::class, 'confirmed'])->name('orders.confirmed');
    Route::put('orders/{code}/canceled', [UserOrderController::class, 'canceled'])->name('orders.canceled');
    Route::delete('orders/{code}/destroy', [UserOrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('transactions', [UserTransactionController::class, 'index'])->name('transactions');
    Route::get('transactions/{code}/show', [UserTransactionController::class, 'show'])->name('transactions.show');
    Route::get('rating/{code}', [RatingController::class, 'index'])->name('rating');
    Route::post('rating/store', [RatingController::class, 'store'])->name('rating.post');
});
