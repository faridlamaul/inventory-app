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
    Route::get('/riwayat', [PeminjamanController::class, 'riwayat']);
});

// Middleware for role 'admin' 
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/user', [AdminController::class, 'index']);
    Route::get('/admin/item', [AdminController::class, 'item']);
});

require __DIR__ . '/auth.php';
