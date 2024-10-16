<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\TipoEstablecimientoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendaController;
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

Auth::routes();
Route::get('/tienda',[TiendaController::class,'index'])->name('tienda.app');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('first.home');
Route::get('/cambiar-password/{id}/{hash}/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.cambiar');


Route::group(['middleware' => ['auth']], function () {

   Route::resource('usuarios', App\Http\Controllers\UsersController::class);
   Route::get('/usuarios/eliminar/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('usuarios.eliminar');
   Route::post('/cambiar/password', [App\Http\Controllers\UsersController::class, 'cambiarpwd'])->name('usuarios.cambiarpwd');

   Route::resource('cuentas', App\Http\Controllers\CuentasController::class);
   Route::get('/cuentas/eliminar/{id}', [App\Http\Controllers\CuentasController::class, 'destroy'])->name('cuentas.eliminar');

   Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil.index');
   Route::post('/perfil/update', [App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update');
   Route::get('/perfil/cambiar/password', [App\Http\Controllers\PerfilController::class, 'cambiarpwd'])->name('perfil.cambiarpwd');
   Route::post('/perfil/update/password', [App\Http\Controllers\PerfilController::class, 'updatepwd'])->name('perfil.updatepwd');

   Route::resource('tipo_establecimientos', TipoEstablecimientoController::class);
   Route::get('/tipo_establecimientos/eliminar/{id}', [App\Http\Controllers\TipoEstablecimientoController::class, 'destroy'])->name('tipo_establecimientos.eliminar');

   Route::resource('establecimientos', EstablecimientoController::class);

   Route::resource('productos', ProductosController::class);
});
