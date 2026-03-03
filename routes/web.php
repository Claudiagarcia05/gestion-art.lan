<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GestionArticulosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // El resource ya crea: index, create, store, show, edit, update, destroy
    // La ruta 'show' del resource es: gestion/{gestion} CON nombre 'gestion.show'
    Route::resource('gestion', GestionArticulosController::class)->names('gestion');
    
    // Esta línea está causando el conflicto porque también usa 'gestion.show'
    // CAMBIA el nombre de esta ruta a 'gestion.ver'
    Route::get('/gestion/{articulo}/ver', [GestionArticulosController::class, 'show'])->name('gestion.ver');
    
    // O si prefieres, elimina la línea anterior y configura el resource para que NO cree la ruta show
    // Route::resource('gestion', GestionArticulosController::class)->except(['show'])->names('gestion');
    // Route::get('/gestion/{articulo}/ver', [GestionArticulosController::class, 'show'])->name('gestion.ver');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';