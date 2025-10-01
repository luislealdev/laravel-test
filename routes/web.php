<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para las tareas
Route::resource('tasks', TaskController::class);

// Rutas para los actores
Route::resource('actors', ActorController::class);

// Rutas para las películas
Route::resource('films', FilmController::class);

// Rutas para las rentas
Route::resource('rentals', RentalController::class);
