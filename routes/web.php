<?php

use App\Http\Controllers\RutasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.index'); // envía al contenido de admin
})->middleware(['auth'])->name('dashboard');


// Ruta pública (usuario)
Route::get('/usuario/inicio', [RutasController::class, 'mostrarContenidoUsuario'])->name('usuario.welcome');

// Ruta protegida (admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [RutasController::class, 'mostrarContenidoAdmin'])->name('admin.index');
});
