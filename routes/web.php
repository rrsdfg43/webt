<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalController;
use Mockery\Generator\Parameter;

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


// Route::post('/panel/subir-capitulo', 'CapituloController@store')->name('admins.store-capitulo');
// Route::get('/panel/subir-capitulo', 'CapituloController@create')->name('admins.create-capitulo');

// Route::view('/lista', 'admins.list')->name('admins.list');
// Route::view('/categoria', 'admins.category')->name('admins.category');

Route::get('/',[GlobalController::class, 'index'])->name('home');
Route::get('/directorio',[GlobalController::class, 'categoria'])->name('directorio');
Route::get('/guia',[GlobalController::class, 'guia'])->name('guia');
Route::get('/peticiones',[GlobalController::class, 'peticion'])->name('peticiones');
Route::get('serie/{capitulo}', [GlobalController::class, 'show'])->name('serie');

Route::auth();
