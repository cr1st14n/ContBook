<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\inventarioController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PromovController;
use App\Http\Controllers\ProvedorController;
use App\Http\Controllers\UsuarioController;
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

Route::group(['prefix' => 'adm', 'middleware' => ['auth']], function () {
    Route::get('/', [AdmController::class, 'index']);
    Route::get('usu', [UsuarioController::class, 'index']);
    Route::post('usu/store', [UsuarioController::class, 'store']);
    Route::get('usu/list_1', [UsuarioController::class, 'list_1']);
    Route::get('usu/edit_1', [UsuarioController::class, 'edit_1']);
    Route::post('usu/update_1/{id}', [UsuarioController::class, 'update_1']);
    Route::post('usu/update_estado', [UsuarioController::class, 'update_estado']);
});
Route::group(['prefix' => 'inventario', 'middleware' => ['auth']], function () {
    Route::get('/', [inventarioController::class, 'index']);

    Route::group(['prefix' => 'producto'], function () {
        Route::get('home', [ProductoController::class, 'index']);
        Route::get('list_1', [ProductoController::class, 'list_1']);
        Route::post('store_1', [ProductoController::class, 'store_1']);
        Route::post('change_est', [ProductoController::class, 'change_est']);
        // * QUERY
        Route::get('query_list_proActivo', [ProductoController::class, 'list_proActivo']);
    });
    Route::group(['prefix' => 'kardex',], function () {
        Route::get('home', [PromovController::class, 'index']);
        Route::post('mov_1/{tipo}', [PromovController::class, 'mov_1']);
    });
    Route::group(['prefix' => 'provedor',], function () {
        Route::get('home', [ProvedorController::class, 'index']);
        // Route::post('mov_1/{tipo}', [ProvedorController::class, 'mov_1']);
    });
});
