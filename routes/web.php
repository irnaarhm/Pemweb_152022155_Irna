<?php

use App\Http\Controllers\FlowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/flower', [FlowerController::class, 'list'])->name('flower');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'process'])->name('login.process');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'process'])->name('register.process');

Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/my-order', [ProfileController::class, 'my_order'])->name('myorder');
    Route::post('/my-order/completed/{id}', [ProfileController::class, 'completed'])->name('completed.order');
    Route::get('/order-detail/{id}', [TransactionController::class, 'order_detail'])->name('order.detail');
    Route::post('/order/{id}', [TransactionController::class, 'order_flower'])->name('order.flower');

    Route::middleware('check-access:1')->group(function () {
        Route::get('/admin/users', [UsersController::class, 'index'])->name('users.index');
        Route::get('/admin/users/add', [UsersController::class, 'create'])->name('users.add');
        Route::post('/admin/users/add', [UsersController::class, 'store'])->name('users.store');
        Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
        Route::put('/admin/users/edit/{id}', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/admin/users/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');

        Route::get('/admin/flower/', [FlowerController::class, 'index'])->name('flower.index');
        Route::get('/admin/flower/add', [FlowerController::class, 'create'])->name('flower.add');
        Route::post('/admin/flower/add', [FlowerController::class, 'store'])->name('flower.store');
        Route::get('/admin/flower/edit/{id}', [FlowerController::class, 'edit'])->name('flower.edit');
        Route::put('/admin/flower/edit/{id}', [FlowerController::class, 'update'])->name('flower.update');
        Route::delete('/admin/flower/delete/{id}', [FlowerController::class, 'delete'])->name('flower.delete');

        Route::get('/admin/stock', [StockController::class, 'index'])->name('stock.index');
        Route::get('/admin/stock/edit/{id}', [StockController::class, 'edit'])->name('stock.edit');
        Route::put('/admin/stock/edit/{id}', [StockController::class, 'update'])->name('stock.update');

        Route::get('/admin/incoming-transaction', [TransactionController::class, 'index'])->name('transaction.incoming');
        Route::get('/admin/history-transaction', [TransactionController::class, 'history_transaction'])->name('transaction.history');
        Route::post('/admin/send-flower/{id}', [TransactionController::class, 'send_flower'])->name('send.flower');
    });
});
