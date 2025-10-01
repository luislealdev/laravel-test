<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas públicas de CRUD (sin middleware)
Route::resource('tasks', TaskController::class);
Route::resource('actors', ActorController::class);
Route::resource('films', FilmController::class);
Route::resource('rentals', RentalController::class);

// Rutas protegidas con middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::put('/admin/users/{user}/role', [AdminController::class, 'updateUserRole'])->name('admin.users.updateRole');
});

Route::middleware(['auth', 'role:admin,moderator'])->group(function () {
    Route::get('/admin/moderator', [AdminController::class, 'moderatorPanel'])->name('admin.moderator');
});

require __DIR__.'/auth.php';
