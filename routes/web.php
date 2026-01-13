<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\createhorarioController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\NivelController;
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


//Ruta para el video de bienvenida
Route::get('/video-bienvenida', [RutasController::class, 'mostrarcontenidovideobienvenida'])->name('video-bienvenida');



//Ruta para mostrar contenido de historia
Route::get('/Historia', [RutasController::class, 'mostrarcontenidohistoria'])->name('Historia');
//Ruta para mostrar contenido de mision y vision
Route::get('/mision-vision', [RutasController::class, 'mostrarcontenidomisionyvision'])->name('mision-vision');
//rutas para msotra contenido de Filosofia institucional 
Route::get('/filosofia-institucional', [RutasController::class, 'mostrarcontenidofilosofiainstitucional'])->name('filosofia_institucional');
//Rutas para mostrar contenido de Simbolos y idnos institucionales
Route::get('/simbolos-institucionales', [RutasController::class, 'mostrarcontenidosimbolosinstitucionales'])->name('simbolos');
///Rutas para mostrar contenido de princiios y valores
Route::get('/principos-valores', [RutasController::class, 'mostrarcontenidoprincipiosyvarolres'])->name('principios-valores');
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





/*============================
RUTAS ENFOQUE PEDAGÓGICO
============================*/
Route::get('/enfoque-padagogico', [RutasController::class, 'mostrarcontenidoenfoquepadagogico'])->name('enfoque-padagogico');


/*============================
RUTAS VIDA ESTUDIANTIL
============================*/
Route::get('/tranporte', [RutasController::class, 'mostrarcontenidotranporte'])->name('transporte');
Route::get('/proyectos-institucionales', [RutasController::class, 'mostrarcontenidoproyectosinstitucionales'])->name('proyectos_institucionales');
Route::get('/eventos-celebraciones', [RutasController::class, 'mostrarcontenidoeventoscelebraciones'])->name('eventos_celebraciones');



/*============================
RUTAS DE ADMISIONES
============================*/
Route::get('/admision', [RutasController::class, 'mostrarcontenidoadmision'])->name('admision');





/*============================
RUTAS DE AUTENTICACIÓN 
============================*/
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);



