<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\personaController;
use App\Http\Controllers\RecordatorioController;
use App\Http\Controllers\utilidadesController;
use App\Models\notasModel;

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

Route::get('/login', [UsuarioController::class, 'buscarUsuario'])->name('login');

Route::get('/', function () {
    return view('login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// PARA BUSCAR EL USUARIO QUE SE INGRESA EN EL LOGIN
Route::post('/buscarUsuario', [UsuarioController::class,  'buscarUsuario'])->name('buscarUsuario');



//DASHBOARD APPLICATIONS
Route::get('/dashboard', function () {
    return view('dashboard');
});


// FORMULARIO DE REGISTRO
Route::get('/registro', function () {
    return view('registro');
});

Route::post('/nuevo_usuario', [UsuarioController::class, 'registrarUsuario'])->name('registrarUsuario');


//CERRAR SESION USUARIO
Route::post('/cerrar_sesion', [UsuarioController::class, 'cerrarSesion'])->name('cerrarSesion');



//RUTAS DE PRUEBA DIV AJAX
Route::get('/vistaNotas', [NotasController::class, 'mostrarNotas'])->name('mostrarNotas');
Route::get("/vistaRecordatorios", [RecordatorioController::class, 'mostrarRecordatorios'])->name('mostrarRecordatorios');

// OBTENER DATOS DE PERFIL
// Route::get('/obtenerPerfil')


//USUARIOS
// BUSCAR DISPONIBILIDAD DE USUARIO
Route::post('/availableUser', [UsuarioController::class, 'availableUser'])->name('availableUser');


//RUTAS PARA NOTAS
Route::post('/crearNota', [NotasController::class, 'crearNota'])->name('crearNota');



//RUTAS PARA FORMULARIOS
Route::get('/acerca_deForm', [utilidadesController::class, 'acerca_deForm'])->name('acerca_deForm');
Route::get('/datos_personalesForm', [utilidadesController::class, 'datos_personalesForm'])->name('datos_personalesForm');
Route::get('/mi_perfilForm', [utilidadesController::class, 'mi_perfilForm'])->name('mi_perfilForm');

// EDITAR NOTA
Route::post('/editarNota', [NotasController::class, 'editarNota'])->name('editarNota');
Route::post('/modificarNota', [NotasController::class, 'modificarNota'])->name('modificarNota');

// MODIFICAR PERFIL PERSONA
// MODIFICAR DATOS PERSONA
Route::post("/modificar_persona", [personaController::class, 'modificar_persona'])->name('modificar_persona');
Route::post('/act_datosP', [UsuarioController::class, 'act_datosP'])->name('act_datosP');

// RECORDATORIOS
Route::post("/publicarRecordatorio", [RecordatorioController::class, 'publicarRecordatorio'])->name('publicarRecordatorio');
Route::post("/detalleRecordatorio", [RecordatorioController::class, 'detalleRecordatorio'])->name('detalleRecordatorio');

Route::post("/ultimoRecordatorio", [RecordatorioController::class, 'ultimoRecordatorio'])->name("ultimoRecordatorio");
Route::post('/actualizarRecordatorio', [RecordatorioController::class, 'actualizarRecordatorio'])->name("actualizarRecordatorio");


Route::post("/eliminarRecordatorio", [RecordatorioController::class, 'eliminarRecordatorio'])->name("eliminarRecordatorio");
Route::post("/eliminarNota", [NotasController::class, 'eliminarNota'])->name('eliminarNota');
