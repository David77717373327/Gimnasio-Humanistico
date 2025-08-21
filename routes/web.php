<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EstudianteController;
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

// Sobreescribir la ruta de registro de Fortify
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Ruta protegida (admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [RutasController::class, 'mostrarContenidoAdmin'])->name('admin.index');
      Route::get('/admin/dashboard', [RutasController::class, 'mostrarContenidoAdmin'])->name('admin.index');

    // Listar estudiantes pendientes
    Route::get('/admin/pendientes', [RutasController::class, 'listarPendientes'])->name('admin.pendientes');

    // Aprobar estudiante
    Route::post('/admin/aprobar/{id}', [RutasController::class, 'aprobarEstudiante'])->name('admin.aprobar');

    // Rechazar estudiante
    Route::post('/admin/rechazar/{id}', [RutasController::class, 'rechazarEstudiante'])->name('admin.rechazar');



    Route::get('/admin/estudiantes', [EstudianteController::class, 'index'])->name('admin.estudiantes.index');
    Route::get('/admin/estudiantes/eliminados', [EstudianteController::class, 'listarUsuariosEliminados'])->name('admin.estudiantes.eliminados');
    Route::post('/admin/estudiantes/{id}/eliminar', [EstudianteController::class, 'eliminarUsuario'])->name('admin.estudiantes.eliminar');
    Route::post('/admin/estudiantes/{id}/restaurar', [EstudianteController::class, 'restaurarUsuario'])->name('admin.estudiantes.restaurar');
    Route::post('/admin/estudiantes/{id}/eliminar-permanente', [EstudianteController::class, 'eliminarPermanente'])->name('admin.estudiantes.eliminarPermanente');
});

// Ruta protegida (estudiante)
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/estudiante/dashboard', [RutasController::class, 'mostrarContenidoEstudiante'])->name('student.index');
});
