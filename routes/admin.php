<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Panel Admin
Route::get('',[HomeController::class, 'index'])->name('admin.home');

Route::get('dashboard',[HomeController::class, 'dashboard'])->name('admin.dashboard');

//Animes
Route::resource('anime', 'AnimeController')
->names('admin.animes');

// Categorias
Route::resource('categoria', 'CategoriaController')
->parameters(['categoria' => 'categoria'])
->names('admin.categorias');

//Capitulos
Route::resource('capitulo', 'CapituloController')
->names('admin.capitulos');