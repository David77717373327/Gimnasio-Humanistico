<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Grado;
use App\Models\Asignatura;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class HorarioController extends Controller
{
    public function index(Request $request)
{
    // Si es una petición JSON (desde el calendario), devolver directamente
    if($request->format === 'json') {
        $query = Horario::with(['grado', 'asignatura', 'user']);
        if($request->grado_id) {
            $query->where('grado_id', $request->grado_id);
        }
        return response()->json($query->get());
    }
    
    try {
        // Query base para la paginación (tabla de edición)
        $query = Horario::with(['grado', 'asignatura', 'user']);
        
        // Aplicar filtros
        if($request->grado_id) {
            $query->where('grado_id', $request->grado_id);
        }
        
        if($request->dia) {
            $query->where('dia', $request->dia);
        }
        
        if($request->asignatura_id) {
            $query->where('asignatura_id', $request->asignatura_id);
        }
        
        // Obtener horarios paginados para la tabla de edición
        $horarios = $query->orderBy('dia')
                         ->orderBy('hora_inicio')
                         ->paginate(15);
        
        // Para la vista de grilla semanal, obtener TODOS los horarios del grado seleccionado
        $todosHorarios = collect();
        if($request->grado_id) {
            $todosHorarios = Horario::with(['grado', 'asignatura', 'user'])
                                   ->where('grado_id', $request->grado_id)
                                   ->orderBy('dia')
                                   ->orderBy('hora_inicio')
                                   ->get()
                                   ->map(function($horario) {
                                       // Normalizar formato de hora para la vista
                                       $horario->hora_inicio_formato = substr($horario->hora_inicio, 0, 5);
                                       return $horario;
                                   });
        }
        // NUEVO: Para la vista general (sin filtros), obtener TODOS los horarios agrupados por grado
        $todosLosHorarios = collect();
        if(!$request->grado_id && !$request->dia && !$request->asignatura_id) {
            $todosLosHorarios = Horario::with(['grado', 'asignatura', 'user'])
                                      ->orderBy('grado_id')
                                      ->orderBy('dia')
                                      ->orderBy('hora_inicio')
                                      ->get();
        }
        // Obtener datos de referencia
        $grados = Grado::orderBy('nombre')->get();
        $asignaturas = Asignatura::orderBy('nombre')->get();
        $profesores = User::where('role', 'professor')
                          ->whereNull('deleted_at')
                          ->orderBy('name')
                          ->get();
        return view('admin.horarios.index', compact(
            'horarios',
            'todosHorarios', 
            'todosLosHorarios',  // NUEVA VARIABLE
            'grados',
            'asignaturas',
            'profesores'
        ));
        
    } catch (\Exception $e) {
        Log::error('Error en index de HorarioController', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'grado_id' => $request->grado_id
        ]);
        return redirect()->back()->with('error', 'Error al cargar los horarios: ' . $e->getMessage());
    }
}

    public function create()
    {
        $grados = Grado::orderBy('nombre')->get();
        $asignaturas = Asignatura::orderBy('nombre')->get();
        $profesores = User::where('role', 'professor')
                         ->whereNull('deleted_at')
                         ->orderBy('name')
                         ->get();

        $horarios = Horario::with(['grado', 'asignatura', 'user'])->get();

        $eventos = $horarios->map(function($h){
            return [
                'id'    => $h->id,
                'title' => ($h->asignatura->nombre ?? 'Sin asignatura') 
                           . ' - ' . ($h->user->name ?? 'Sin profe'),
                'start' => $h->dia . 'T' . $h->hora_inicio,
                'end'   => $h->dia . 'T' . $h->hora_fin,
            ];
        })->toArray();

        return view('admin.horarios.calendar', compact(
            'grados',
            'asignaturas',
            'profesores',
            'eventos'
        ));
    }

    /**
     * Validar conflictos de horarios de manera inteligente
     */
    private function validarConflictos($gradoId, $dia, $horaInicio, $profesorId = null, $excludeId = null)
    {
        $conflictos = [];

        // 1. Verificar si ya existe un horario para el mismo grado, día y hora
        $horarioMismoGrado = Horario::where('grado_id', $gradoId)
                                   ->where('dia', $dia)
                                   ->where('hora_inicio', $horaInicio)
                                   ->when($excludeId, function($query, $excludeId) {
                                       return $query->where('id', '!=', $excludeId);
                                   })
                                   ->with(['asignatura'])
                                   ->first();

        if ($horarioMismoGrado) {
            $conflictos[] = [
                'tipo' => 'grado_ocupado',
                'mensaje' => "Este grado ya tiene {$horarioMismoGrado->asignatura->nombre} programado para {$dia} a las {$horaInicio}",
                'severidad' => 'error',
                'sugerencia' => 'Selecciona otra hora o reemplaza el horario existente'
            ];
        }

        // 2. Verificar si el profesor ya está ocupado en esa franja (solo si se proporciona profesor)
        if ($profesorId) {
            $profesorOcupado = Horario::where('user_id', $profesorId)
                                     ->where('dia', $dia)
                                     ->where('hora_inicio', $horaInicio)
                                     ->when($excludeId, function($query, $excludeId) {
                                         return $query->where('id', '!=', $excludeId);
                                     })
                                     ->with(['grado'])
                                     ->first();

            if ($profesorOcupado) {
                $conflictos[] = [
                    'tipo' => 'profesor_ocupado',
                    'mensaje' => "Este profesor ya tiene clases con {$profesorOcupado->grado->nombre} el {$dia} a las {$horaInicio}",
                    'severidad' => 'warning',
                    'sugerencia' => 'Puedes continuar si es intencional (ej: profesor itinerante) o selecciona otro profesor'
                ];
            }
        }

        return $conflictos;
    }

    public function store(Request $request)
    {
        try {
            // Log para debugging
            Log::info('Petición store recibida', [
                'content_type' => $request->header('Content-Type'),
                'is_json' => $request->isJson(),
                'data' => $request->all()
            ]);

            // Detectar si es JSON y procesar los datos
            if ($request->isJson()) {
                $data = $request->json()->all();
                $request->merge($data);
                Log::info('Datos JSON procesados', ['merged_data' => $request->all()]);
            }

            // Validación básica
            $validatedData = $request->validate([
                'grado_id' => 'required|exists:grados,id',
                'asignatura_id' => 'required|exists:asignaturas,id',
                'user_id' => 'nullable|exists:users,id',
                'dia' => 'required|string|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
                'hora_inicio' => 'required|date_format:H:i',
                'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            ]);

            Log::info('Datos validados correctamente', ['validated' => $validatedData]);

            // Validar conflictos usando la función mejorada
            $conflictos = $this->validarConflictos(
                $validatedData['grado_id'],
                $validatedData['dia'],
                $validatedData['hora_inicio'],
                $validatedData['user_id'] ?? null
            );

            // Separar conflictos por severidad
            $errores = collect($conflictos)->where('severidad', 'error')->values();
            $advertencias = collect($conflictos)->where('severidad', 'warning')->values();

            // Si hay errores críticos, no permitir creación
            if ($errores->isNotEmpty()) {
                $mensajeError = $errores->first()['mensaje'];
                $sugerencia = $errores->first()['sugerencia'] ?? '';
                
                Log::warning('Conflicto crítico detectado', [
                    'mensaje' => $mensajeError,
                    'sugerencia' => $sugerencia
                ]);

                if ($request->expectsJson() || $request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'error' => $mensajeError,
                        'sugerencia' => $sugerencia,
                        'tipo_error' => 'conflicto_critico'
                    ], 409);
                }
                
                return redirect()->back()
                    ->withErrors(['horario' => $mensajeError])
                    ->with('sugerencia', $sugerencia)
                    ->withInput();
            }

            // Si hay advertencias pero no errores críticos, permitir creación con aviso
            if ($advertencias->isNotEmpty()) {
                Log::info('Advertencias detectadas pero permitiendo creación', [
                    'advertencias' => $advertencias->toArray()
                ]);
            }

            Log::info('Intentando crear horario...', ['data_to_create' => $validatedData]);

            // Crear el horario
            $horario = Horario::create($validatedData);

            Log::info('Horario creado exitosamente', [
                'horario_id' => $horario->id,
                'grado' => $horario->grado_id,
                'dia' => $horario->dia,
                'hora' => $horario->hora_inicio,
            ]);

            // Respuesta según el tipo de petición
            if ($request->expectsJson() || $request->ajax()) {
                $horario->load(['grado', 'asignatura', 'user']);
                
                $response = [
                    'success' => true, 
                    'message' => 'Horario registrado correctamente',
                    'horario' => $horario
                ];

                // Incluir advertencias si las hay
                if ($advertencias->isNotEmpty()) {
                    $response['advertencias'] = $advertencias->pluck('mensaje')->toArray();
                }

                return response()->json($response);
            }

            // Respuesta tradicional para formularios
            $successMessage = 'Horario registrado correctamente.';
            if ($advertencias->isNotEmpty()) {
                $successMessage .= ' Nota: ' . $advertencias->first()['mensaje'];
            }

            return redirect()->route('admin.horarios.index')
                             ->with('success', $successMessage);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Error de validación en store', [
                'errors' => $e->errors(),
                'input' => $request->all()
            ]);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors(),
                    'tipo_error' => 'validacion'
                ], 422);
            }

            throw $e;

        } catch (\Exception $e) {
            Log::error('Error general en store de HorarioController', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->all()
            ]);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'error' => 'Error interno del servidor: ' . $e->getMessage(),
                    'tipo_error' => 'servidor'
                ], 500);
            }

            return redirect()->back()
                             ->with('error', 'Error al crear el horario: ' . $e->getMessage())
                             ->withInput();
        }
    }

    public function edit(Horario $horario)
    {
        $grados = Grado::orderBy('nombre')->get();
        $asignaturas = Asignatura::orderBy('nombre')->get();
        $profesores = User::where('role', 'professor')->get();

        return view('admin.horarios.edit', compact('horario', 'grados', 'asignaturas', 'profesores'));
    }

    public function update(Request $request, Horario $horario)
    {
        try {
            // Detectar si es JSON y procesar los datos
            if ($request->isJson()) {
                $data = $request->json()->all();
                $request->merge($data);
            }

            // Validación básica
            $validatedData = $request->validate([
                'grado_id' => 'required|exists:grados,id',
                'asignatura_id' => 'required|exists:asignaturas,id',
                'user_id' => 'nullable|exists:users,id',
                'dia' => 'required|string|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
                'hora_inicio' => 'required|date_format:H:i',
                'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            ]);

            // Validar conflictos (excluyendo el horario actual)
            $conflictos = $this->validarConflictos(
                $validatedData['grado_id'],
                $validatedData['dia'],
                $validatedData['hora_inicio'],
                $validatedData['user_id'] ?? null,
                $horario->id // Excluir el horario actual
            );

            $errores = collect($conflictos)->where('severidad', 'error')->values();
            $advertencias = collect($conflictos)->where('severidad', 'warning')->values();

            // Si hay errores críticos, no permitir actualización
            if ($errores->isNotEmpty()) {
                $mensajeError = $errores->first()['mensaje'];
                $sugerencia = $errores->first()['sugerencia'] ?? '';
                
                if ($request->expectsJson() || $request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'error' => $mensajeError,
                        'sugerencia' => $sugerencia,
                        'tipo_error' => 'conflicto_critico'
                    ], 409);
                }
                
                return redirect()->back()
                    ->withErrors(['horario' => $mensajeError])
                    ->with('sugerencia', $sugerencia)
                    ->withInput();
            }

            $horario->update($validatedData);

            if ($request->expectsJson() || $request->ajax()) {
                $horario->load(['grado', 'asignatura', 'user']);
                
                $response = [
                    'success' => true,
                    'message' => 'Horario actualizado correctamente',
                    'horario' => $horario
                ];

                if ($advertencias->isNotEmpty()) {
                    $response['advertencias'] = $advertencias->pluck('mensaje')->toArray();
                }

                return response()->json($response);
            }

            $successMessage = 'Horario actualizado correctamente.';
            if ($advertencias->isNotEmpty()) {
                $successMessage .= ' Nota: ' . $advertencias->first()['mensaje'];
            }

            return redirect()->route('admin.horarios.index')
                             ->with('success', $successMessage);

        } catch (\Exception $e) {
            Log::error('Error en update de HorarioController', [
                'error' => $e->getMessage(),
                'horario_id' => $horario->id
            ]);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'error' => 'Error al actualizar: ' . $e->getMessage(),
                    'tipo_error' => 'servidor'
                ], 500);
            }

            return redirect()->back()
                             ->with('error', 'Error al actualizar el horario: ' . $e->getMessage());
        }
    }

    public function destroy(Horario $horario)
    {
        try {
            $horario->delete();

            if (request()->expectsJson() || request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Horario eliminado correctamente'
                ]);
            }

            return redirect()->route('admin.horarios.index')
                             ->with('success', 'Horario eliminado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error en destroy de HorarioController', [
                'error' => $e->getMessage(),
                'horario_id' => $horario->id
            ]);

            if (request()->expectsJson() || request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'error' => 'Error al eliminar: ' . $e->getMessage()
                ], 500);
            }
            return redirect()->back()
                             ->with('error', 'Error al eliminar el horario: ' . $e->getMessage());
        }
    }

    public function verHorarioEstudiante()
    {
        $estudiante = Auth::user();

        if (!$estudiante->grado_id) {
            return back()->with('error', 'No tienes un grado asignado.');
        }

        $horarios = Horario::with(['asignatura', 'user'])
            ->where('grado_id', $estudiante->grado_id)
            ->orderBy('dia')
            ->orderBy('hora_inicio')
            ->get();

        return view('student.horarios.horario', compact('horarios'));
    }

    public function descargarHorarioEstudiante()
    {
        $estudiante = Auth::user();

        if (!$estudiante->grado_id) {
            return back()->with('error', 'No tienes un grado asignado.');
        }

        $horarios = Horario::with(['asignatura', 'user'])
                    ->where('grado_id', $estudiante->grado_id)
                    ->orderBy('dia')
                    ->orderBy('hora_inicio')
                    ->get();

        $pdf = Pdf::loadView('student.horario_pdf', compact('horarios', 'estudiante'));
        return $pdf->download('Horario_'.$estudiante->name.'.pdf');
    }
}