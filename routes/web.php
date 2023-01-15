<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\UserController;

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

        Route::get('index',[UserController::class,'index'])->name('users.index');
        Route::get('create',[UserController::class,'create'])->name('users.create');
        Route::get('edit',[UserController::class,'edit'])->name('users.edit');
        Route::delete('destroy/{user}',[UserController::class,'destroy'])->name('users.destroy');

        // Route::get('roles',[RolController::class,'index'])->name('roles.index');
        // Route::get('permisos',[RolController::class,'permisos'])->name('permisos.index');
    });

    Route::group(['prefix'=> 'archivos'], function () {
        Route::get('index',[ArchivoController::class,'index'])->name('archivo.index');
        Route::get('create',[ArchivoController::class,'create'])->name('archivo.create');
        Route::post('store',[ArchivoController::class,'store'])->name('archivo.store');
        Route::get('edit/{archivo}',[ArchivoController::class,'edit'])->name('archivo.edit');
        Route::put('update/{archivo}',[ArchivoController::class,'update'])->name('archivo.update');
        Route::delete('destroy/{archivo}',[ArchivoController::class,'destroy'])->name('archivo.destroy');
    });
});
