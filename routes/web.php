<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\CaducidadController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\hubicacionController;
use App\Http\Controllers\inventarioController;
use App\Http\Controllers\KardexController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\modAppController;
use App\Http\Controllers\PedidoController;
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
Route::post('log1', [loginController::class, 'login']);
Route::post('logout', [loginController::class, 'logout'])->name('logout');
Route::get('index', [homeController::class, 'index']);
Route::get('indexApp', [homeController::class, 'index_APP']);

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
        Route::get('query_buscarPro', [ProductoController::class, 'query_buscarPro']);
        Route::get('query_buscarListPro', [ProductoController::class, 'query_buscarListPro']);
    });
    Route::group(['prefix' => 'kardex',], function () {
        Route::get('home', [KardexController::class, 'index']);
        Route::get('query_list_1', [KardexController::class, 'query_list_1']);
        Route::get('query_list_2', [KardexController::class, 'query_list_2']);
        Route::post('mov_E', [KardexController::class, 'mov_E']);
        Route::post('mov_S', [KardexController::class, 'mov_S']);
    });
    Route::group(['prefix' => 'provedor',], function () {
        Route::get('home', [ProvedorController::class, 'index']);
        Route::post('query_store', [ProvedorController::class, 'query_store']);
        Route::get('query_list', [ProvedorController::class, 'query_list']);
        Route::get('query_upd_estado', [ProvedorController::class, 'query_upd_estado']);
        Route::get('query_prov_search', [ProvedorController::class, 'query_prov_search']);
        Route::get('query_edit_prov', [ProvedorController::class, 'query_edit_prov']);
        Route::post('query_update_prov/{id}', [ProvedorController::class, 'query_update_prov']);
        // Route::post('mov_1/{tipo}', [ProvedorController::class, 'mov_1']);
    });
    Route::group(['prefix' => 'caducidad'], function () {
        Route::get('query_list_1', [CaducidadController::class, 'query_list1']);
        Route::post('check_est_cad', [CaducidadController::class, 'check_est_cad']);
    });
    Route::group(['prefix' => 'compras'], function () {
        Route::get('home', [ComprasController::class, 'index']);
        Route::post('store_1', [ComprasController::class, 'store_1']);
    });
});
Route::group(['prefix' => 'cliente', 'middleware' => ['auth']], function () {
    Route::get('/', [ClienteController::class, 'home']);
    Route::get('list_1', [ClienteController::class, 'list_1']);
    Route::post('query_create', [ClienteController::class, 'store']);
    Route::get('query_edit', [ClienteController::class, 'query_edit']);
    Route::post('query_update/{id}', [ClienteController::class, 'query_update']);
    Route::post('query_edit_estado', [ClienteController::class, 'query_edit_estado']);
    Route::get('query_search_1', [ClienteController::class, 'query_search_1']);
});
Route::group(['prefix' => 'Pedido', 'middleware' => ['auth']], function () {
    Route::get('/', [PedidoController::class, 'home']);
    Route::get('list_1/', [PedidoController::class, 'list_1']);
    Route::get('create_1', [PedidoController::class, 'create_1']);
});
Route::group(['prefix' => 'Hubicaion', 'middleware' => ['auth']], function () {
    Route::get('/', [hubicacionController::class, 'home']);
    Route::get('/list_1', [hubicacionController::class, 'list_1']);
});

Route::group(['prefix' => 'ContApp', 'middleware' => ['auth']], function () {
    Route::get('/', [modAppController::class, 'home'])->name('AppHome');
    Route::group(['prefix' => 'cliente'], function () {
        Route::get('/', [modAppController::class, 'homeCliente']);
        Route::post('storeCliente', [modAppController::class, 'storeCliente']);
    });
    Route::group(['prefix' => 'Pedido'], function () {
        Route::get('/', [modAppController::class, 'homePedido']);
        Route::get('busCliente', [modAppController::class, 'busCliente']);
        Route::get('listProducto', [modAppController::class, 'listProducto']);
        Route::get('busProducto', [modAppController::class, 'busProducto']);
        Route::get('busProducto_2', [modAppController::class, 'busProducto_2']);
        Route::post('storePedido', [modAppController::class, 'storePedido']);
    });
    Route::group(['prefix' => 'Catalogo',], function () {
        Route::get('/', [modAppController::class, 'homeCatalogo']);
        Route::get('list1', [modAppController::class, 'list1']);
    });
});
