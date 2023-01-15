<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArchivoController;
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
    return view('plantilla.app');
});
Route::get('/home', function () {
    return view('home');
});

Route::group(['prefix'=> 'archivos'], function () {
    Route::get('index',[ArchivoController::class,'index'])->name('archivo.index');
    Route::get('create',[ArchivoController::class,'create'])->name('archivo.create');
    Route::post('store',[ArchivoController::class,'store'])->name('archivo.store');
    Route::get('edit/{archivo}',[ArchivoController::class,'edit'])->name('archivo.edit');
    Route::put('update/{archivo}',[ArchivoController::class,'update'])->name('archivo.update');
    Route::delete('destroy/{archivo}',[ArchivoController::class,'destroy'])->name('archivo.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
