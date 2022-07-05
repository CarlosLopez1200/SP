<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeticionesController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;


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
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/offline', function (){
    return view('home');
});

Route::get('Peticiones/pdf', [App\Http\Controllers\PeticionesController::class, 'pdf'])->name('Peticiones.pdf');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('Roles', RolController::class);
    Route::resource('Usuarios', UsuarioController::class);
    Route::resource('Servicios', ServiciosController::class);
    Route::resource('Peticiones', PeticionesController::class);
});
