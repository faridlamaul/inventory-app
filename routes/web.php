<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;

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

require __DIR__ . '/auth.php';