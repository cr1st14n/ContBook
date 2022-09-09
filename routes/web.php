<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\inventarioController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductoController;
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

Route::get('/', function () {
    return view('login.login');
})->name('login')->middleware('guest');
Route::any('log1', [loginController::class, 'login']);


Route::post('logout', [loginController::class, 'logout'])->name('logout');

Route::get('index', [homeController::class, 'index']);

Route::group(['prefix' => 'usuario'], function () {
    Route::get('/');
});
Route::group(['prefix' => 'inventario', 'middleware' => ['auth']], function () {
    Route::get('/', [inventarioController::class, 'index']);

    Route::group(['prefix' => 'producto'], function () {
        Route::get('home', [ProductoController::class, 'index']);
    });
});
