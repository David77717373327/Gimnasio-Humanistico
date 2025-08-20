<?php

use App\Http\Controllers\RutasController;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.index');
    } elseif ($user->role === 'student') {
        return redirect()->route('student.index');
    } else {
        return redirect()->route('usuario.welcome'); // visitantes logueados o "user"
    }
})->middleware(['auth'])->name('dashboard');


// Ruta pública (usuario)
Route::get('/usuario/inicio', [RutasController::class, 'mostrarContenidoUsuario'])->name('usuario.welcome');

// Ruta protegida (admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [RutasController::class, 'mostrarContenidoAdmin'])->name('admin.index');
});

// Ruta protegida (estudiante)
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/estudiante/dashboard', [RutasController::class, 'mostrarContenidoEstudiante'])->name('student.index');
});
