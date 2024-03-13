<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonajeController;
use App\Http\Controllers\RazaController;


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

Route::resource('personajes', PersonajeController::class);

Route::resource('razas', RazaController::class);

Route::get('/mispersonajes', [PersonajeController::class, 'mispersonajes'])->name('personajes.misPersonajes');

Route::delete('personajes/{id}/destroy', [PersonajeController::class, 'destroy'])->name('personajes.destroy');

Route::get('personajes/{id}/edit', [PersonajeController::class, 'edit'])->name('personajes.edit');


require __DIR__.'/auth.php';
