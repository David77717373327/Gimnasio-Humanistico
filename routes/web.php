<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ProfesorController;
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

//Ruta para mostrar contenido de historia
Route::get('/Historia', [RutasController::class, 'mostrarcontenidohistoria'])->name('Historia');
//Ruta para mostrar contenido de mision y vision
Route::get('/mision-vision', [RutasController::class, 'mostrarcontenidomisionyvision'])->name('mision-vision');
//rutas para msotra contenido de Filosofia institucional 
Route::get('/filosofia-institucional', [RutasController::class, 'mostrarcontenidofilosofiainstitucional'])->name('filosofia_institucional');
//Rutas para mostrar contenido de Simbolos y idnos institucionales
Route::get('/simbolos-institucionales', [RutasController::class, 'mostrarcontenidosimbolosinstitucionales'])->name('simbolos');
///Rutas para mostrar contenido de princiios y valores
Route::get('/principos-valores', [RutasController::class, 'mostrarcontenidoprincipiosyvalores'])->name('principios-valores');
Route::get('/politica-calidad', [RutasController::class, 'mostrarcontenidopoliticadecalidad'])->name('politica-calidad');





    
//Rutas para mostrar contenido de ORGANIZACION
Route::get('/organigrama', [RutasController::class, 'mostrarcontenidoorganigrama'])->name('organigrama');
Route::get('/Grupo-humanistico', [RutasController::class, 'mostrarcontenidoGrupohumanistico'])->name('Grupo_humanistico');
Route::get('/Gobierno-escolar', [RutasController::class, 'mostrarcontenidoGobiernoescolar'])->name('Gobierno_escolar');
Route::get('/Administrativos', [RutasController::class, 'mostrarcontenidoAdministrativos'])->name('Administrativos');
Route::get('/Docentes', [RutasController::class, 'mostrarcontenidoDocentes'])->name('Docentes');
Route::get('/Directivos', [RutasController::class, 'mostrarcontenidoDirectivos'])->name('Directivos');


//Rutas para mostrar contenido de niveles educativos
Route::get('/Prescolar', [RutasController::class, 'mostrarcontenidoprecolar'])->name('prescolar');

Route::get('/BasicaPrimaria', [RutasController::class, 'mostrarcontenidobasicaprimaria'])->name('basica_primaria');

Route::get('/BasicaSegundaria', [RutasController::class, 'mostrarcontenidobasicasegundaria'])->name('basica_segundaria');

Route::get('/Mediaacademica', [RutasController::class, 'mostrarcontenidomediaacademica'])->name('media_academica');






//Rutas para la navegacion de vida estudantil
Route::get('/tranporte', [RutasController::class, 'mostrarcontenidotranporte'])->name('transporte');





//Rutas de admnisones
Route::get('/admision', [RutasController::class, 'mostrarcontenidoadmision'])->name('admision');




// Sobreescribir la ruta de registro de Fortify
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Ruta protegida (admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
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
    // Rutas adicionales para AJAX (opcional - si prefieres endpoints específicos)
    Route::post('/admin/grados/{grado}', [GradoController::class, 'update'])->name('admin.grados.update.ajax'); // Para manejar PATCH/PUT via POST

    // // Añadir estas rutas a tu web.php busqueda grados 
    // Route::get('/admin/grados/search', [GradoController::class, 'search'])->name('admin.grados.search');
    // Route::get('/admin/grados/export', [GradoController::class, 'export'])->name('admin.grados.export');
    // Route::post('/admin/grados/import', [GradoController::class, 'import'])->name('admin.grados.import');
    // Route::post('/admin/grados/{grado}/duplicate', [GradoController::class, 'duplicate'])->name('admin.grados.duplicate');
    // Route::patch('/admin/grados/{grado}/toggle-status', [GradoController::class, 'toggleStatus'])->name('admin.grados.toggle-status');
    // Route::get('/admin/grados/stats', [GradoController::class, 'stats'])->name('admin.grados.stats');


    //Rutas para Gestionar Asignaturas (CRUD)
    Route::get('/admin/asignaturas', [AsignaturaController::class, 'index'])->name('admin.asignaturas.index');
    Route::get('/admin/asignaturas/create', [AsignaturaController::class, 'create'])->name('admin.asignaturas.create');
    Route::post('/admin/asignaturas', [AsignaturaController::class, 'store'])->name('admin.asignaturas.store');
    Route::get('/admin/asignaturas/{asignatura}/edit', [AsignaturaController::class, 'edit'])->name('admin.asignaturas.edit');
    Route::put('/admin/asignaturas/{asignatura}', [AsignaturaController::class, 'update'])->name('admin.asignaturas.update');
    Route::delete('/admin/asignaturas/{asignatura}', [AsignaturaController::class, 'destroy'])->name('admin.asignaturas.destroy');

    // Agregar esta ruta para AJAX
    Route::get('/admin/asignaturas/{asignatura}', [AsignaturaController::class, 'show'])->name('admin.asignaturas.show');
    Route::get('/admin/pendientes', [EstudianteController::class, 'listarPendientes'])->name('admin.estudiantes.pendientes');
    Route::post('/admin/aprobar/{id}', [EstudianteController::class, 'aprobar'])->name('admin.estudiantes.aprobar');
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

    //Rutas para gestionar profesores (CRUD)
    Route::get('/admin/profesores', [ProfesorController::class, 'listarProfesores'])->name('admin.profesores.index');
    Route::post('/admin/profesores', [ProfesorController::class, 'crearProfesor'])->name('admin.profesores.store');
    Route::put('/admin/profesores/{id}', [ProfesorController::class, 'editarProfesor'])->name('admin.profesores.update');
    Route::delete('/admin/profesores/{id}', [ProfesorController::class, 'eliminarProfesor'])->name('admin.profesores.destroy');
});


//Rutas protegidas para el profesor 
Route::middleware(['auth', 'role:professor'])->group(function () {
    Route::get('/profesor/dashboard', [RutasController::class, 'mostrarContenidoProfesor'])->name('professor.index');
});


// Ruta protegida (estudiante)
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/estudiante/dashboard', [RutasController::class, 'mostrarContenidoEstudiante'])->name('student.index');
    // Ver horario
    Route::get('/estudiante/horario', [HorarioController::class, 'verHorarioEstudiante'])->name('student.horario.index');
    // Descargar horario en PDF
    Route::get('/estudiante/horario/descargar', [HorarioController::class, 'descargarHorarioEstudiante'])->name('student.horario.descargar');
});
