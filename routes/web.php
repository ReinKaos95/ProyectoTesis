<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PrestamoEquipoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\configController;
use App\Http\Controllers\ayudaController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\ModelotController;
use App\Http\Controllers\selectController;

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
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Rutas de los controladores
//Route::get('/dashboard', [LoginController::class, 'login']); 
//Ruta principal de los usuarios
// Route::resource('admin/usuarios', userController::class);
Route::get('admin/usuarios', [userController::class, 'index']); 

//Comunicacion con el protocolo AJAX de los usuarios

//Route::get('/list_usuarios', [userController::class, 'index']); 
Route::post('/usersAdd', [userController::class, 'store']);
Route::put('/usersUpdate/{id}', [userController::class, 'update']);
Route::delete('/usersDelete/{id}', [userController::class, 'destroy']);


//Ruta principal de los equipos
Route::resource('admin/equipos', equiposController::class);

//Comunicacion con el protocolo AJAX del equipo
Route::get('/equipos', [EquipoController::class, 'selectAnidado'],function ()
{
    return view('admin/equipos/index');
});

Route::get('/list_modelos/{id}', [EquipoController::class, 'getModelo']);

Route::get('/list_equipos', [EquipoController::class, 'index']); 
Route::get('/equiposLoad', [EquipoController::class, 'selectAnidado']);
Route::post('/equiposAdd', [EquipoController::class, 'store']);
Route::put('/equiposUpdate/{id}', [EquipoController::class, 'update']);
Route::delete('/equiposDelete/{id}', [EquipoController::class, 'destroy']);

//Ruta principal de los prestamos
//Route::resource('admin/prestamos', PrestamoEquipoController::class);


//Comunicacion con el protocolo AJAX de los prestamos
Route::get('/prestamos',  [PrestamoEquipoController::class, 'selector'], function ()
{
    return view('admin/prestamos/index');
});

Route::get('/list_prestamos', [PrestamoEquipoController::class, 'index']); 
Route::get('/prestamosLoad', [PrestamoEquipoController::class, 'loadAjax']);
Route::post('/prestamosAdd', [PrestamoEquipoController::class, 'store']);
Route::put('/prestamosUpdate/{id}', [PrestamoEquipoController::class, 'update']);
Route::delete('/prestamosDelete/{id}', [PrestamoEquipoController::class, 'destroy']);


Route::resource('admin/auditoria', AuditoriaController::class);
Route::get('getData', [PrestamoEquipoController::class, 'index']);
Route::post('store', [AuditoriaController::class, 'store']);





Route::resource('admin/departamentos', DepartamentoController::class);
Route::put('/departamentosUpdate/{id}', [DepartamentoController::class, 'update']);

Route::resource('config', configController::class);
Route::resource('config/ayuda', ayudaController::class);

Route::get('imagen', function ()
{
    return view ('profile/imagen');
});