<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\marcaController;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\universalController;
use App\Http\Controllers\productoController;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('formulario_marca', function () {
    return view('formulario_marca');
})->name("formulario_marca");

//--------------------------------RUTAS MARCA----------------------------------------------------------------
    Route::get("/NuevaMarca", [marcaController::class, "mostrar"])->name("marca.formulario");

    Route::delete("marca/eliminar/{id}", [marcaController::class, "eliminar"])->name("marca.eliminar");

    Route::get("marca/editar/{id}", [marcaController::class, "editar"])->name("marca.editar");

    Route::put("marca/actualizar/{id}", [marcaController::class, "actualizar"])->name("marca.actualizar");


//---------------------------------RUTAS PROVEEDOR-------------------------------------------------------------
    Route::get("/NuevoProveedor", [proveedorController::class, "mostrar"])->name("pro.formulario");;

    Route::delete("proveedor/eliminar/{id}", [proveedorController::class, "eliminar"])->name("pro.eliminar");

    Route::get("proveedor/editar/{id}", [proveedorController::class, "editar"])->name("pro.editar");

    Route::put("proveedor/actualizar/{id}", [proveedorController::class, "actualizar"])->name("pro.actualizar");

//---------------------------------RUTAS CATEGORIA---------------------------------------------------------------
    Route::get("/NuevaCategoria", [universalController::class, "mostrarCat"])->name("cat.formulario");;

    Route::delete("categoria/eliminar/{id}", [universalController::class, "eliminar"])->name("cat.eliminar");

    Route::get("categoria/editar/{id}", [universalController::class, "editar"])->name("cat.editar");

    Route::put("categoria/actualizar/{id}", [universalController::class, "actualizar"])->name("cat.actualizar");

//---------------------------------RUTAS TIPOS HERRAMIENTAS---------------------------------------------------------------
Route::get("NuevoTipo", [universalController::class, "mostrarfk"])->name("tipo.formulario");

Route::delete("tipo/eliminar/{id}", [universalController::class, "eliminarTip"])->name("tipo.eliminar");

Route::get("tipo/editar/{id}", [universalController::class, "editarTip"])->name("tipo.editar");

Route::put("tipo/actualizar/{id}", [universalController::class, "actualizarTip"])->name("tipo.actualizar");

Route::get("Entrada/{id}", [productoController::class, "entrada"])->name("pro.entrada");

Route::post("Entrada/Actualizar/{id}", [productoController::class,"insertarEntrada"])->name("entrada.insertar");

Route::get("Salida/{id}", [productoController::class, "salida"])->name("pro.salida");

Route::post("Salida/Actualizar/{id}", [productoController::class,"insertarSalida"])->name("salida.insertar");

Route::get("Lista_Movimiento", [productoController::class, "mostrarEntrada"])->name("productos.MOV");

Route::get("Lista_Salida", [productoController::class, "mostrarSalida"])->name("productos.Sal");

Route::delete("producto/eliminar/{id}", [productoController::class, "eliminarProducto"])->name("hta.eliminar");

Route::get("producto/editar/{id}", [productoController::class, "editarProducto"])->name("hta.editar");

Route::put("producto/actualizar/{id}", [productoController::class, "actualizarProducto"])->name("hta.actualizar");

//RUTAS DE LAS VISTAS//
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/NuevoProducto', function (){
        return view('formulario_producto');
    });
    Route::get('/lista', function(){
        return view ("lista_producto");
    });

    Route::get("lista_producto", [productoController::class, "mostrar"])->name("productos.mostrar");

    Route::get("NuevaHerramienta", [universalController::class, "mostrarfk1"])->name("producto.registro");



    //RUTAS PARA LLAMAR LAS FUNCIONES Y EJECUTARLAS
   

    Route::post("GuardarMarca", [marcaController::class,"insertar"])->name("marca.insertar");

    Route::post("GuardarProveedor", [proveedorController::class,"insertar"])->name("proveedor.insertar");

    Route::post("GuardarCategoria", [universalController::class,"insertar"])->name("categoria.insertar");

    Route::post("GuardarTipo", [universalController:: class, "insertar1"])->name("tipo.insertar");

    Route::post("GuardarHerramienta", [productoController:: class, "insertar"])->name("herramienta.insertar");

    Route::post("GuardarPersona", [universalController::class,"insertarPer"])->name("persona.insertar");

//PDF
//Route::name('imprimir')->get('/imprimir-pdf', 'marcaController@imprimir');
Route::get("imprimir", [productoController::class,"imprimir"])->name("imprimir");
