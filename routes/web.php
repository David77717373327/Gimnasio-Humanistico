<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\HorarioController;
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
    } elseif ($user->role === 'professor') {
        return redirect()->route('professor.index');
    } else {
        return redirect()->route('usuario.welcome');
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
    
    //Rutas para gestionar horarios (CRUD)
    Route::get('/admin/horarios', [HorarioController::class, 'index'])->name('admin.horarios.index');
    Route::get('/admin/horarios/create', [HorarioController::class, 'create'])->name('admin.horarios.create');
    Route::post('/admin/horarios', [HorarioController::class, 'store'])->name('admin.horarios.store');
    Route::get('/admin/horarios/{horario}/edit', [HorarioController::class, 'edit'])->name('admin.horarios.edit');
    Route::put('/admin/horarios/{horario}', [HorarioController::class, 'update'])->name('admin.horarios.update');
    Route::delete('/admin/horarios/{horario}', [HorarioController::class, 'destroy'])->name('admin.horarios.destroy');

    //Rutas para gestionar los grados (CRUD)
    Route::get('/admin/grados', [GradoController::class, 'index'])->name('admin.grados.index');
    Route::get('/admin/grados/create', [GradoController::class, 'create'])->name('admin.grados.create');
    Route::post('/admin/grados', [GradoController::class, 'store'])->name('admin.grados.store');
    Route::get('/admin/grados/{grado}/edit', [GradoController::class, 'edit'])->name('admin.grados.edit');
    Route::put('/admin/grados/{grado}', [GradoController::class, 'update'])->name('admin.grados.update');
    Route::delete('/admin/grados/{grado}', [GradoController::class, 'destroy'])->name('admin.grados.destroy');

    //Rutas para Gestionar Asignaturas (CRUD)
    Route::get('/admin/asignaturas', [AsignaturaController::class, 'index'])->name('admin.asignaturas.index');
    Route::get('/admin/asignaturas/create', [AsignaturaController::class, 'create'])->name('admin.asignaturas.create');
    Route::post('/admin/asignaturas', [AsignaturaController::class, 'store'])->name('admin.asignaturas.store');
    Route::get('/admin/asignaturas/{id}/edit', [AsignaturaController::class, 'edit'])->name('admin.asignaturas.edit');
    Route::put('/admin/asignaturas/{id}', [AsignaturaController::class, 'update'])->name('admin.asignaturas.update');
    Route::delete('/admin/asignaturas/{id}', [AsignaturaController::class, 'destroy'])->name('admin.asignaturas.destroy');



// Listar estudiantes pendientes
    Route::get('/admin/pendientes', [EstudianteController::class, 'listarPendientes'])->name('admin.estudiantes.pendientes');
    // Aprobar estudiante
    Route::post('/admin/aprobar/{id}', [EstudianteController::class, 'aprobar'])->name('admin.estudiantes.aprobar');
    // Rechazar estudiante
    Route::post('/admin/rechazar/{id}', [EstudianteController::class, 'rechazar'])->name('admin.estudiantes.rechazar');


        //Rutas para gestionar estudiantes(CRUD)
    Route::get('/admin/estudiantes', [EstudianteController::class, 'index'])->name('admin.estudiantes.index');
    Route::get('/admin/estudiantes/eliminados', [EstudianteController::class, 'listarUsuariosEliminados'])->name('admin.estudiantes.eliminados');
    Route::post('/admin/estudiantes/{id}/eliminar', [EstudianteController::class, 'eliminarUsuario'])->name('admin.estudiantes.eliminar');
    Route::post('/admin/estudiantes/{id}/restaurar', [EstudianteController::class, 'restaurarUsuario'])->name('admin.estudiantes.restaurar');
    Route::post('/admin/estudiantes/{id}/eliminar-permanente', [EstudianteController::class, 'eliminarPermanente'])->name('admin.estudiantes.eliminarPermanente');

    //Rutas para asignar profesor
    Route::post('/admin/asignar-profesor/{id}', [EstudianteController::class, 'asignarProfesor'])->name('admin.asignarProfesor');
    //Rutas para remover el profesor
    Route::post('/admin/remover-profesor/{id}', [EstudianteController::class, 'removerProfesor'])->name('admin.removerProfesor');
    Route::get('/profesor/dashboard', [RutasController::class, 'mostrarContenidoProfesor'])->name('professor.index');
    Route::post('/admin/asignar-profesor/{id}', [EstudianteController::class, 'asignarProfesor'])->name('admin.asignarProfesor')->middleware(['auth', 'role:admin']);

});



//Rutas protegidas para el profesor 
Route::middleware(['auth', 'role:professor'])->group(function () {
    Route::get('/profesor/dashboard', [RutasController::class, 'mostrarContenidoProfesor'])->name('professor.index');
});




// Ruta protegida (estudiante)
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/estudiante/dashboard', [RutasController::class, 'mostrarContenidoEstudiante'])->name('student.index');


    
});
