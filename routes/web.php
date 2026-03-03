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
        Route::resource('gestion', GestionArticulosController::class)->names('gestion');
        
        Route::get('/gestion/{articulo}/ver', [GestionArticulosController::class, 'show'])->name('gestion.show');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';