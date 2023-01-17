<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\AsistenciaController;





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

Route::get('/plantilla', function () {
    return view('plantilla.app');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=> 'usuarios'], function () {
        Route::get('profile',[UserController::class,'show2'])->name('user.show');
        Route::patch('update',[UserController::class,'update2'])->name('user.update');
        Route::resource('users', UserController::class)->names('users');
        Route::resource('roles', RoleController::class)->names('roles');
    });

    Route::resource('personal', PersonalController::class)->names('personal');
    Route::resource('horarios', HorarioController::class)->names('horarios');
    Route::resource('archivos', ArchivoController::class)->names('archivos');

    Route::group(['prefix'=> 'certificados'], function () {
        Route::get('index',[CertificadoController::class,'index'])->name('certificados.index');
    });
});

Route::get('asistencias',[AsistenciaController::class,'index'])->name('asistencias.index');

