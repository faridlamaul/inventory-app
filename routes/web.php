<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('Homepage');
});

// Middleware for role 'user' 
Route::group(['middleware' => ['role:user']], function () {
    Route::get('/barang', [PeminjamanController::class, 'index']);
    Route::post('/barang/pinjam/{id}', [PeminjamanController::class, 'qrCheck']);
    Route::get('/riwayat', [PeminjamanController::class, 'riwayat']);
});

// Middleware for role 'admin' 
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/user', [AdminController::class, 'index']);
    Route::delete('/admin/user/deleteUser/{id}', [AdminController::class, 'deleteUser']);
    Route::get('/admin/item', [AdminController::class, 'item']);
    Route::get('/admin/item/add', [AdminController::class, 'item_add']);
    Route::post('/admin/item/add', [AdminController::class, 'addItem']);
    Route::get('/admin/item/edit/{id}', [AdminController::class, 'item_edit']);
    Route::put('/admin/item/edit/{id}', [AdminController::class, 'updateItem']);
    Route::delete('/admin/item/delete/{id}', [AdminController::class, 'deleteItem']);
});

require __DIR__ . '/auth.php';