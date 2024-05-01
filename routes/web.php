<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SignController;
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
    return view('index');
});

Route::get('/inicioSesion', [LoginController::class, 'inicioSesion'])->name('inicio_sesion');;

Route::get('/crearCuenta', function(){
    return view('signin');
});

Route::post('/verificar', [LoginController::class, 'verificarUsuario'])->name('verificar_usuario');

Route::get('/main', [MainController::class, 'main'])->name('main-page');

Route::post('/crear-usuario', [SignController::class, 'createUser']);

Route::post('/guardar-archivo', [MainController::class, 'guardarArchivo'])->name('guardar-archivo');