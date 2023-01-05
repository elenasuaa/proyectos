<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
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
    return view('inicio');
});

Route::post('registar', [UsuarioController::class, 'insertar'])->name('usuario.insertar');

Route::get('registrar', function(){
    return view ("registrar");
});

Route::put("producto/insertar", [ProductoController::class, "insertar"])->name("producto.insertar");

Route::get('formulario', function(){
    return view ("formulario_producto");
});

Route::get("lista_productos", [ProductoController::class, "mostrar"])->name("productos.mostrar");

Route::get('lista', function(){
    return view ("lista_productos");
});

Route::get("producto/{producto}/mostrar",[ProductoController::class, "mostrarPorId"])->name("producto.mostrarPorId");

Route::get("producto/{producto}/editar", [ProductoController::class, "editar"])->name("producto.editar");

Route::put("producto/{producto}/actualizar", [ProductoController::class, "actualizar"])->name("producto.actualizar");

Route::get("producto/{producto}/comprar", [ProductoController::class, "comprar"])->name("producto.comprar");