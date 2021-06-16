<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\equiposController;
use App\Http\Controllers\auditoriaController;
use App\Http\Controllers\prestamosController;
use App\Http\Controllers\departamentosController;
use App\Http\Controllers\listController;
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
    return view('welcome');
});


//Rutas de los controladores

//Ruta principal de los usuarios
Route::resource('admin/users', userController::class);

//Comunicacion con el protocolo AJAX de los usuarios
Route::get('/usersLoad', [userController::class, 'loadAjax']);
Route::post('/usersAdd', [userController::class, 'store']);
Route::put('/usersUpdate/{id}', [userController::class, 'update']);
Route::delete('/usersDelete/{id}', [userController::class, 'destroy']);


//Ruta principal de los equipos
Route::resource('admin/equipment', equiposController::class);

//Comunicacion con el protocolo AJAX del equipo
Route::get('/equiposLoad', [equiposController::class, 'loadAjax']);
Route::post('/equiposAdd', [equiposController::class, 'store']);
Route::put('/equiposUpdate/{id}', [equiposController::class, 'update']);
Route::delete('/equiposDelete/{id}', [equiposController::class, 'destroy']);

//Ruta principal de los prestamos
Route::resource('admin/prestamos', prestamosController::class);


//Comunicacion con el protocolo AJAX de los prestamos
Route::get('/prestamosLoad', [prestamosController::class, 'loadAjax']);
Route::post('/prestamosAdd', [prestamosController::class, 'store']);
Route::put('/prestamosUpdate/{id}', [prestamosController::class, 'update']);
Route::delete('/prestamosDelete/{id}', [prestamosController::class, 'destroy']);

/*
Route::resource('admin/auditoria', auditoriaController::class);*/
Route::resource('admin/departamentos', departamentosController::class);
Route::get('admin/pdf/invoice', [listController::class, 'exportInvoice']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
