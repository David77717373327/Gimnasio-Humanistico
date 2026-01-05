<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Grado;
use App\Models\Nivel;
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
            
            // Para la vista general (sin filtros), obtener TODOS los horarios agrupados por grado
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
                'todosLosHorarios',
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
        // ✅ AGREGAR NIVELES
        $niveles = Nivel::orderBy('nombre')->get();
        
        // Cargar grados con su relación nivel
        $grados = Grado::with('nivel')->orderBy('nombre')->get();
        
        $asignaturas = Asignatura::orderBy('nombre')->get();
        
        $profesores = User::where('role', 'professor')
                         ->whereNull('deleted_at')
                         ->orderBy('name')
                         ->get();

        // ✅ PASAR NIVELES A LA VISTA
        return view('admin.horarios.calendar', compact(
            'niveles',
            'grados',
            'asignaturas',
            'profesores'
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
                'profesor_id' => 'nullable|exists:users,id', // ✅ Cambiar user_id a profesor_id
                'dia' => 'required|string|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
                'hora_inicio' => 'required|date_format:H:i',
                'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            ]);

            Log::info('Datos validados correctamente', ['validated' => $validatedData]);

            // ✅ Mapear profesor_id a user_id para compatibilidad con la base de datos
            if (isset($validatedData['profesor_id'])) {
                $validatedData['user_id'] = $validatedData['profesor_id'];
                unset($validatedData['profesor_id']);
            }

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
                'profesor_id' => 'nullable|exists:users,id', // ✅ Cambiar user_id a profesor_id
                'dia' => 'required|string|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
                'hora_inicio' => 'required|date_format:H:i',
                'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            ]);

            // ✅ Mapear profesor_id a user_id
            if (isset($validatedData['profesor_id'])) {
                $validatedData['user_id'] = $validatedData['profesor_id'];
                unset($validatedData['profesor_id']);
            }

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


@extends('layouts.master')

@section('content')

<div class="enterprise-schedule-system">
    <!-- Header empresarial -->
    <div class="app-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="app-title">
                        <i class="fas fa-calendar-alt"></i>
                        Sistema de Horarios Académicos
                    </h1>
                    <div class="app-subtitle">Gestión profesional de horarios escolares</div>
                </div>
                <div class="col-auto">
                    <button class="btn-enterprise secondary" onclick="showHelp()">
                        <i class="fas fa-question-circle"></i>
                        Ayuda
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="container-fluid py-4">
        <!-- Barra de control -->
        <div class="control-bar">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <label class="form-label fw-bold mb-2">Seleccionar Nivel</label>
                    <select id="nivelSelect" class="grade-selector form-select">
                        <option value="">Seleccione un nivel</option>
                        @foreach($niveles as $nivel)
                            <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold mb-2">Seleccionar Grado</label>
                    <select id="gradoSelect" class="grade-selector form-select" disabled>
                        <option value="">Seleccione un grado</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <div id="statusContainer">
                        <div id="loadingStatus" class="status-indicator status-loading d-none">
                            <div class="loading-spinner"></div>
                            <span>Cargando...</span>
                        </div>
                        <div id="scheduleStatus" class="status-indicator status-info d-none">
                            <i class="fas fa-info-circle"></i>
                            <span>Seleccione un nivel y grado</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Layout principal -->
        <div class="main-layout">
            <!-- Sidebar con recursos -->
            <div class="sidebar" style="background: #fff;">
                <!-- Asignaturas -->
                <div class="enterprise-card sidebar-section">
                    <div class="card-body">
                        <h3 class="sidebar-title">
                            <i class="fas fa-book"></i>
                            Asignaturas
                        </h3>
                        <div id="subjectsList">
                            @foreach($asignaturas as $asignatura)
                                <div class="resource-chip subject draggable" 
                                     draggable="true" 
                                     data-type="asignatura" 
                                     data-id="{{ $asignatura->id }}" 
                                     data-text="{{ e($asignatura->nombre) }}">
                                    <div class="chip-icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <span class="text-truncate">{{ $asignatura->nombre }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Profesores -->
                <div class="enterprise-card sidebar-section">
                    <div class="card-body">
                        <h3 class="sidebar-title">
                            <i class="fas fa-chalkboard-teacher"></i>
                            Profesores
                        </h3>
                        <div id="teachersList">
                            @foreach($profesores as $profesor)
                                <div class="resource-chip teacher draggable" 
                                     draggable="true" 
                                     data-type="profesor" 
                                     data-id="{{ $profesor->id }}" 
                                     data-text="{{ e($profesor->name) }}">
                                    <div class="chip-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-truncate">{{ $profesor->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Configurar Descansos -->
                <div class="enterprise-card sidebar-section">
                    <div class="card-body">
                        <h3 class="sidebar-title">
                            <i class="fas fa-coffee"></i>
                            Descansos
                        </h3>
                        <button id="configBreaksBtn" class="btn-enterprise warning w-100" disabled>
                            <i class="fas fa-cog"></i>
                            Configurar Descansos
                        </button>
                        <div id="breaksInfo" class="mt-3 small text-muted">
                            Selecciona un grado para gestionar sus descansos
                        </div>
                    </div>
                </div>
            </div>

            <!-- Área principal de horarios -->
            <div class="schedule-area">
                <div class="schedule-container">
                    <div class="schedule-header">
                        <div>
                            <h2 class="m-0">Horario Semanal</h2>
                            <small class="opacity-75" id="scheduleSubtitle">Selecciona un grado para comenzar</small>
                        </div>
                        <div id="scheduleCounter" class="d-flex align-items-center gap-2">
                            <span class="badge bg-light text-dark">0 clases programadas</span>
                        </div>
                    </div>
                    
                    <div class="schedule-table-wrapper">
                        <table class="schedule-table">
                            <thead>
                                <tr>
                                    <th style="width: 120px;">Hora</th>
                                    <th data-dia="Lunes">Lunes</th>
                                    <th data-dia="Martes">Martes</th>
                                    <th data-dia="Miércoles">Miércoles</th>
                                    <th data-dia="Jueves">Jueves</th>
                                    <th data-dia="Viernes">Viernes</th>
                                </tr>
                            </thead>
                            <tbody id="scheduleBody">
                                <!-- Se generará dinámicamente según el nivel/grado -->
                            </tbody>
                        </table>
                    </div>
                    @include('admin.horarios.horarios-pdf') 
                </div>
            </div>
        </div>

        <!-- Barra de acciones flotante -->
        <div class="action-bar">
            <div class="d-flex align-items-center gap-3">
                <div id="pendingCounter" class="text-muted small">
                    <i class="fas fa-clock"></i>
                    <span id="pendingCount">0</span> cambios pendientes
                </div>
                <div id="savedCounter" class="text-muted small">
                    <i class="fas fa-check-circle"></i>
                    <span id="savedCount">0</span> clases guardadas
                </div>
            </div>
            <div class="d-flex gap-2">
                <button id="resetBtn" class="btn-enterprise secondary">
                    <i class="fas fa-undo"></i>
                    Reiniciar
                </button>
                <button id="saveBtn" class="btn-enterprise primary" disabled>
                    <i class="fas fa-save"></i>
                    <span id="saveBtnText">Guardar Cambios</span>
                </button>
                <button id="downloadBtn" class="btn-enterprise success">
                    <i class="fas fa-download"></i>
                    Descargar PDF
                </button>
                <a href="{{ route('admin.horarios.index') }}" class="btn-enterprise info">
                    <i class="fas fa-list"></i>
                    Ver Horarios
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Contenedor de notificaciones -->
<div id="notificationContainer" class="notification-container"></div>

<!-- Modal de selección de profesor -->
<div class="modal fade enterprise-modal" id="teacherModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-chalkboard-teacher me-2"></i>
                    Seleccionar Profesor
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted small mb-3">Selecciona el profesor que impartirá esta clase:</p>
                <select id="teacherSelect" class="form-select"></select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-enterprise secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" id="confirmTeacher" class="btn-enterprise primary">
                    <i class="fas fa-check"></i>
                    Confirmar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de configuración de descansos -->
<div class="modal fade enterprise-modal" id="breaksModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-coffee me-2"></i>
                    Configurar Descansos
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="breaksListContainer">
                    <!-- Se llenará dinámicamente -->
                </div>
                <hr>
                <h6>Agregar Nuevo Descanso</h6>
                <div class="row g-3">
                    <div class="col-6">
                        <label class="form-label">Hora Inicio</label>
                        <input type="time" id="newBreakStart" class="form-control">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Hora Fin</label>
                        <input type="time" id="newBreakEnd" class="form-control">
                    </div>
                </div>
                <button type="button" id="addBreakBtn" class="btn-enterprise primary w-100 mt-3">
                    <i class="fas fa-plus"></i>
                    Agregar Descanso
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-enterprise secondary" data-bs-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmación universal -->
<div class="modal fade enterprise-modal" id="confirmModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalTitle">Confirmar acción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="confirmModalBody">
                <!-- Contenido dinámico -->
            </div>
            <div class="modal-footer" id="confirmModalFooter">
                <button type="button" class="btn-enterprise secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" id="confirmAction" class="btn-enterprise primary">
                    Confirmar
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/horarios.css') }}">
<link rel="stylesheet" href="{{ asset('css/horarios-pdf.css') }}">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="{{ asset('js/horario.js') }}"></script>
<script>
    // Configuración global de Laravel
    window.Laravel = {
        csrfToken: @json(csrf_token()),
        niveles: @json($niveles->mapWithKeys(function($n){ return [$n->id => $n->nombre]; })->toArray()),
        grados: @json($grados->map(function($g){ 
            return [
                'id' => $g->id, 
                'nombre' => $g->nombre, 
                'nivel_id' => $g->nivel_id
            ]; 
        })->toArray()),
        profesores: @json($profesores->map(function($p){ return ['id'=>$p->id,'name'=>$p->name]; })->toArray()),
        asignaturas: @json($asignaturas->mapWithKeys(function($a){ return [$a->id => $a->nombre]; })->toArray()),
        routes: {
            horarios_index: @json(route('admin.horarios.index')),
            horarios_store: @json(route('admin.horarios.store')),
            descansos_index: '/admin/descansos',
            descansos_store: '/admin/descansos',
            descansos_delete: '/admin/descansos'
        }
    };

    // Función de ayuda global
    function showHelp() {
        alert('Sistema de Ayuda\n\n' +
              '1. Selecciona un nivel educativo\n' +
              '2. Selecciona un grado\n' +
              '3. Configura los descansos para ese grado\n' +
              '4. Arrastra asignaturas y profesores al horario\n' +
              '5. Guarda los cambios\n' +
              '6. Descarga el PDF con el horario completo');
    }
</script>
@endpush




/**
 * ========================================
 * SISTEMA DE HORARIOS CON DESCANSOS POR NIVEL/GRADO
 * ========================================
 */

document.addEventListener('DOMContentLoaded', () => {
  // Configuración desde Laravel
  const CSRF = window.Laravel.csrfToken;
  const NIVELES = window.Laravel.niveles;
  const GRADOS = window.Laravel.grados;
  const PROFESORES = window.Laravel.profesores;
  const ASIGNATURAS = window.Laravel.asignaturas;
  const ROUTES = window.Laravel.routes;

  // Estado de la aplicación
  let CURRENT_NIVEL_ID = null;
  let CURRENT_GRADO_ID = null;
  let CURRENT_GRADO_DATA = null;
  let DESCANSOS_GRADO = [];

  // Arrays para manejo de datos
  let pendingHorarios = [];
  let savedHorarios = [];
  let existingHorarios = [];

  // Elementos DOM principales
  const nivelSelect = document.getElementById('nivelSelect');
  const gradoSelect = document.getElementById('gradoSelect');
  const loadingStatus = document.getElementById('loadingStatus');
  const scheduleStatus = document.getElementById('scheduleStatus');
  const scheduleCounter = document.getElementById('scheduleCounter');
  const scheduleSubtitle = document.getElementById('scheduleSubtitle');
  const pendingCount = document.getElementById('pendingCount');
  const savedCount = document.getElementById('savedCount');
  const saveBtn = document.getElementById('saveBtn');
  const saveBtnText = document.getElementById('saveBtnText');
  const resetBtn = document.getElementById('resetBtn');
  const downloadBtn = document.getElementById('downloadBtn');
  const configBreaksBtn = document.getElementById('configBreaksBtn');
  const breaksInfo = document.getElementById('breaksInfo');
  const scheduleBody = document.getElementById('scheduleBody');

  // ========================================
  // SISTEMA DE NOTIFICACIONES
  // ========================================
  class NotificationManager {
    constructor() {
      this.container = document.getElementById('notificationContainer');
      this.notifications = new Map();
    }

    show(type, title, message, duration = 5000) {
      const id = Date.now() + Math.random();
      const icons = {
        success: 'fas fa-check-circle',
        error: 'fas fa-exclamation-circle',
        warning: 'fas fa-exclamation-triangle',
        info: 'fas fa-info-circle'
      };

      const notification = document.createElement('div');
      notification.className = `notification ${type}`;
      notification.innerHTML = `
        <div class="notification-header">
          <div class="notification-icon">
            <i class="${icons[type]}"></i>
          </div>
          <div class="notification-content">
            <div class="notification-title">${title}</div>
            <div class="notification-message">${message}</div>
          </div>
          <button class="notification-close" onclick="notificationManager.close(${id})">
            <i class="fas fa-times"></i>
          </button>
        </div>
        ${type !== 'error' ? '<div class="notification-progress"><div class="notification-progress-bar"></div></div>' : ''}
      `;

      this.container.insertAdjacentElement('afterbegin', notification);
      this.notifications.set(id, notification);

      if (type !== 'error' && duration > 0) {
        setTimeout(() => this.close(id), duration);
      }

      return id;
    }

    close(id) {
      const notification = this.notifications.get(id);
      if (notification) {
        notification.style.animation = 'slideOutRight 0.3s forwards';
        setTimeout(() => {
          notification.remove();
          this.notifications.delete(id);
        }, 300);
      }
    }
  }

  // ========================================
  // GESTOR DE DESCANSOS
  // ========================================
  class BreaksManager {
    async load(gradoId) {
      try {
        const response = await fetch(`${ROUTES.descansos_index}?grado_id=${gradoId}`, {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });

        if (response.ok) {
          DESCANSOS_GRADO = await response.json();
          this.updateBreaksInfo();
          return DESCANSOS_GRADO;
        } else {
          DESCANSOS_GRADO = [];
          return [];
        }
      } catch (error) {
        console.error('Error cargando descansos:', error);
        DESCANSOS_GRADO = [];
        return [];
      }
    }

    updateBreaksInfo() {
      if (!CURRENT_GRADO_ID) {
        breaksInfo.innerHTML = 'Selecciona un grado para gestionar sus descansos';
        configBreaksBtn.disabled = true;
        return;
      }

      configBreaksBtn.disabled = false;

      if (DESCANSOS_GRADO.length === 0) {
        breaksInfo.innerHTML = '<span class="text-warning"><i class="fas fa-exclamation-triangle"></i> Sin descansos configurados</span>';
      } else {
        const breaksList = DESCANSOS_GRADO.map(d =>
          `${d.hora_inicio.substring(0, 5)} - ${d.hora_fin.substring(0, 5)}`
        ).join('<br>');
        breaksInfo.innerHTML = `<strong>${DESCANSOS_GRADO.length} descanso(s):</strong><br>${breaksList}`;
      }
    }

    async showConfigModal() {
      if (!CURRENT_GRADO_ID) {
        notificationManager.show('warning', 'Selecciona un grado', 'Primero debes seleccionar un grado.');
        return;
      }

      await this.load(CURRENT_GRADO_ID);
      this.renderBreaksList();

      const modal = new bootstrap.Modal(document.getElementById('breaksModal'));
      modal.show();
    }

    renderBreaksList() {
      const container = document.getElementById('breaksListContainer');

      if (DESCANSOS_GRADO.length === 0) {
        container.innerHTML = '<p class="text-muted text-center">No hay descansos configurados para este grado.</p>';
        return;
      }

      container.innerHTML = '<h6>Descansos Actuales</h6>' + DESCANSOS_GRADO.map(d => `
        <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light rounded">
          <span><strong>${d.hora_inicio.substring(0, 5)}</strong> - <strong>${d.hora_fin.substring(0, 5)}</strong></span>
          <button class="btn btn-sm btn-danger" onclick="breaksManager.delete(${d.id})">
            <i class="fas fa-trash"></i>
          </button>
        </div>
      `).join('');
    }

    async add() {
      const startInput = document.getElementById('newBreakStart');
      const endInput = document.getElementById('newBreakEnd');

      const horaInicio = startInput.value;
      const horaFin = endInput.value;

      if (!horaInicio || !horaFin) {
        notificationManager.show('warning', 'Campos incompletos', 'Completa ambos campos de hora.');
        return;
      }

      if (horaInicio >= horaFin) {
        notificationManager.show('warning', 'Horario inválido', 'La hora de inicio debe ser menor que la hora de fin.');
        return;
      }

      try {
        const response = await fetch(ROUTES.descansos_store, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': CSRF,
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: JSON.stringify({
            grado_id: CURRENT_GRADO_ID,
            hora_inicio: horaInicio,
            hora_fin: horaFin
          })
        });

        const data = await response.json();

        if (response.ok && data.success) {
          notificationManager.show('success', 'Descanso agregado', 'El descanso ha sido configurado correctamente.');
          startInput.value = '';
          endInput.value = '';
          await this.load(CURRENT_GRADO_ID);
          this.renderBreaksList();
          scheduleManager.generateScheduleTable();
        } else {
          notificationManager.show('error', 'Error', data.message || 'No se pudo agregar el descanso.');
        }
      } catch (error) {
        console.error('Error agregando descanso:', error);
        notificationManager.show('error', 'Error de conexión', 'No se pudo conectar con el servidor.');
      }
    }

    async delete(descansoId) {
      if (!confirm('¿Eliminar este descanso?')) return;

      try {
        const response = await fetch(`${ROUTES.descansos_delete}/${descansoId}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': CSRF,
            'X-Requested-With': 'XMLHttpRequest'
          }
        });

        if (response.ok) {
          notificationManager.show('success', 'Eliminado', 'Descanso eliminado correctamente.');
          await this.load(CURRENT_GRADO_ID);
          this.renderBreaksList();
          scheduleManager.generateScheduleTable();
        } else {
          notificationManager.show('error', 'Error', 'No se pudo eliminar el descanso.');
        }
      } catch (error) {
        console.error('Error eliminando descanso:', error);
        notificationManager.show('error', 'Error de conexión', 'No se pudo conectar con el servidor.');
      }
    }
  }

  // ========================================
  // GESTOR PRINCIPAL DEL SISTEMA
  // ========================================
  class EnterpriseScheduleManager {
    constructor() {
      this.init();
    }

    init() {
      this.setupEventListeners();
      this.updateCounters();
    }

    setupEventListeners() {
      // Cambio de nivel
      nivelSelect.addEventListener('change', (e) => {
        this.handleNivelChange(e.target.value);
      });

      // Cambio de grado
      gradoSelect.addEventListener('change', (e) => {
        this.handleGradoChange(e.target.value);
      });

      // Botones principales
      if (saveBtn) {
        saveBtn.addEventListener('click', () => this.saveAllPending());
      }

      if (resetBtn) {
        resetBtn.addEventListener('click', () => this.resetSchedule());
      }

      if (downloadBtn) {
        downloadBtn.addEventListener('click', () => this.downloadPDF());
      }

      if (configBreaksBtn) {
        configBreaksBtn.addEventListener('click', () => breaksManager.showConfigModal());
      }

      // Botón agregar descanso
      const addBreakBtn = document.getElementById('addBreakBtn');
      if (addBreakBtn) {
        addBreakBtn.addEventListener('click', () => breaksManager.add());
      }
    }

    handleNivelChange(nivelId) {
      CURRENT_NIVEL_ID = nivelId ? parseInt(nivelId) : null;
      CURRENT_GRADO_ID = null;
      CURRENT_GRADO_DATA = null;

      // Limpiar selector de grados
      gradoSelect.innerHTML = '<option value="">Seleccione un grado</option>';
      gradoSelect.disabled = true;

      // Limpiar horario
      this.clearSchedule();
      breaksManager.updateBreaksInfo();

      if (!nivelId) return;

      // Filtrar grados por nivel
      const gradosDelNivel = GRADOS.filter(g => g.nivel_id === parseInt(nivelId));

      if (gradosDelNivel.length === 0) {
        notificationManager.show('warning', 'Sin grados', `El nivel ${NIVELES[nivelId]} no tiene grados registrados.`);
        return;
      }

      gradosDelNivel.forEach(g => {
        const option = document.createElement('option');
        option.value = g.id;
        option.textContent = g.nombre;
        gradoSelect.appendChild(option);
      });

      gradoSelect.disabled = false;
      notificationManager.show('info', 'Nivel seleccionado', `Ahora selecciona un grado de ${NIVELES[nivelId]}.`);
    }

    async handleGradoChange(gradoId) {
      CURRENT_GRADO_ID = gradoId ? parseInt(gradoId) : null;

      if (!CURRENT_GRADO_ID) {
        CURRENT_GRADO_DATA = null;
        this.clearSchedule();
        breaksManager.updateBreaksInfo();
        return;
      }

      // Obtener datos del grado
      CURRENT_GRADO_DATA = GRADOS.find(g => g.id === CURRENT_GRADO_ID);

      if (!CURRENT_GRADO_DATA) {
        notificationManager.show('error', 'Error', 'No se encontró el grado seleccionado.');
        return;
      }

      this.showLoadingStatus();

      try {
        // Cargar descansos y horarios
        await breaksManager.load(CURRENT_GRADO_ID);
        this.generateScheduleTable();
        await this.loadExistingSchedules(CURRENT_GRADO_ID);

        scheduleSubtitle.textContent = `${CURRENT_GRADO_DATA.nombre} - ${NIVELES[CURRENT_GRADO_DATA.nivel_id]}`;

        this.hideLoadingStatus();
        this.showScheduleStatus();
      } catch (error) {
        this.hideLoadingStatus();
        notificationManager.show('error', 'Error al cargar', 'No se pudieron cargar los horarios.');
      }
    }

    generateScheduleTable() {
      if (!scheduleBody) return;

      scheduleBody.innerHTML = '';

      const horaInicio = 7;
      const horaFin = 13;

      const descansosSorted = [...DESCANSOS_GRADO].sort((a, b) =>
        a.hora_inicio.localeCompare(b.hora_inicio)
      );

      for (let h = horaInicio; h < horaFin; h++) {
        const horaActual = `${String(h).padStart(2, '0')}:00`;
        const horaSiguiente = `${String(h + 1).padStart(2, '0')}:00`;

        // Crear fila de clase
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td class="time-cell">
            <div class="fw-bold">${horaActual}</div>
            <small class="text-muted">${horaSiguiente}</small>
          </td>
          ${['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'].map(dia => `
            <td class="schedule-cell dropzone" 
                data-dia="${dia}" 
                data-inicio="${horaActual}" 
                data-fin="${horaSiguiente}">
              <div class="slot-placeholder">
                <div class="placeholder-day">${dia}</div>
                <div class="placeholder-time">${horaActual}</div>
                <div class="placeholder-action">Arrastra aquí</div>
              </div>
            </td>
          `).join('')}
        `;
        scheduleBody.appendChild(tr);

        // Verificar si hay descanso después de esta hora
        const descansoEnEstaHora = descansosSorted.find(d => {
          const descansoInicio = d.hora_inicio.substring(0, 5);
          return descansoInicio === horaSiguiente;
        });

        if (descansoEnEstaHora) {
          const breakTr = document.createElement('tr');
          breakTr.className = 'break-row';
          breakTr.innerHTML = `
            <td class="time-cell">
              <div class="fw-bold text-warning">${descansoEnEstaHora.hora_inicio.substring(0, 5)}</div>
<small class="text-muted">${descansoEnEstaHora.hora_fin.substring(0, 5)}</small>
</td>
<td colspan="5">
<div class="break-indicator">
<i class="fas fa-coffee"></i>
<span>Descanso — ${descansoEnEstaHora.hora_inicio.substring(0, 5)} a ${descansoEnEstaHora.hora_fin.substring(0, 5)}</span>
</div>
</td>
`;
          scheduleBody.appendChild(breakTr);
        }
      }
      // Volver a configurar drag and drop
      this.setupDragAndDrop();
    }

    setupDragAndDrop() {
      // Configurar elementos arrastrables
      document.querySelectorAll('.draggable').forEach(chip => {
        chip.addEventListener('dragstart', (e) => {
          const data = {
            type: e.target.dataset.type,
            id: e.target.dataset.id,
            text: e.target.dataset.text
          };
          e.dataTransfer.setData('text/plain', JSON.stringify(data));
        });
      });

      // Configurar zonas de drop
      document.querySelectorAll('.dropzone').forEach(cell => {
        cell.addEventListener('dragover', (e) => {
          if (!cell.classList.contains('occupied') || cell.classList.contains('editing')) {
            e.preventDefault();
            cell.classList.add('dragover');
          }
        });

        cell.addEventListener('dragleave', () => {
          cell.classList.remove('dragover');
        });

        cell.addEventListener('drop', async (e) => {
          e.preventDefault();
          cell.classList.remove('dragover');
          await this.handleDrop(e, cell);
        });
      });
    }

    async handleDrop(e, cell) {
      if (!CURRENT_GRADO_ID) {
        notificationManager.show('warning', 'Selecciona un grado', 'Primero debes seleccionar un grado.');
        return;
      }

      const data = JSON.parse(e.dataTransfer.getData('text/plain') || '{}');
      if (!data || !data.id) return;

      await this.assignToCell(cell, data);
    }

    async assignToCell(cell, data) {
      const dia = cell.dataset.dia;
      const horaInicio = cell.dataset.inicio;
      const horaFin = cell.dataset.fin;

      let asignaturaId = cell.dataset.asignaturaId;
      let profesorId = cell.dataset.userId;

      if (data.type === 'asignatura') {
        asignaturaId = data.id;
      } else if (data.type === 'profesor') {
        profesorId = data.id;
      }

      // Si falta profesor, pedirlo
      if (!profesorId) {
        profesorId = await this.showTeacherSelection();
        if (!profesorId) {
          notificationManager.show('warning', 'Profesor requerido', 'Debes seleccionar un profesor.');
          return;
        }
      }

      const horarioData = {
        grado_id: CURRENT_GRADO_ID,
        asignatura_id: asignaturaId,
        profesor_id: profesorId,
        dia: dia,
        hora_inicio: horaInicio,
        hora_fin: horaFin,
        cell: cell
      };

      this.addToPending(horarioData);
      this.renderScheduleSlot(cell, {
        asignaturaId: asignaturaId,
        profesorId: profesorId,
        asignaturaText: data.type === 'asignatura' ? data.text : ASIGNATURAS[asignaturaId],
        profesorText: this.getProfessorName(profesorId),
        isExisting: false
      });

      cell.classList.add('occupied');
      this.updateCounters();
    }

    renderScheduleSlot(cell, info) {
      if (info.asignaturaId) cell.dataset.asignaturaId = info.asignaturaId;
      if (info.profesorId) cell.dataset.userId = info.profesorId;

      const slotHtml = `
    <div class="class-slot ${info.isExisting ? 'existing' : 'pending'}">
      <div class="slot-status ${info.isExisting ? 'existing' : 'pending'}"></div>
      <div class="slot-content">
        <div class="slot-subject">${info.asignaturaText || 'Asignatura'}</div>
        <div class="slot-teacher">${info.profesorText || 'Profesor'}</div>
      </div>
      <div class="slot-actions">
        <button class="slot-btn" onclick="scheduleManager.removeSchedule(this)" title="Eliminar">
          <i class="fas fa-trash"></i>
        </button>
      </div>
    </div>
  `;

      cell.innerHTML = slotHtml;
    }

    addToPending(horarioData) {
      pendingHorarios.push(horarioData);
      this.updateCounters();
    }

    async loadExistingSchedules(gradoId) {
      try {
        const response = await fetch(`${ROUTES.horarios_index}?grado_id=${gradoId}&format=json`, {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });

        if (response.ok) {
          const horarios = await response.json();
          this.loadSchedulesIntoTable(horarios);

          if (horarios.length > 0) {
            notificationManager.show('success', 'Horarios cargados', `Se encontraron ${horarios.length} clases programadas.`);
          }
        }
      } catch (error) {
        console.error('Error cargando horarios:', error);
      }
    }

    loadSchedulesIntoTable(horarios) {
      existingHorarios = [];

      horarios.forEach(h => {
        const horaInicioNormalizada = h.hora_inicio.substring(0, 5);
        const selector = `.dropzone[data-dia="${h.dia}"][data-inicio="${horaInicioNormalizada}"]`;
        const cell = document.querySelector(selector);

        if (cell && !cell.classList.contains('occupied')) {
          cell.dataset.horarioId = h.id;
          cell.classList.add('occupied', 'has-existing');

          this.renderScheduleSlot(cell, {
            asignaturaId: h.asignatura_id,
            profesorId: h.profesor_id,
            asignaturaText: ASIGNATURAS[h.asignatura_id],
            profesorText: this.getProfessorName(h.profesor_id),
            isExisting: true
          });

          existingHorarios.push({ ...h, cell: cell });
        }
      });

      this.updateCounters();
    }

    async saveAllPending() {
      if (pendingHorarios.length === 0) return;

      if (saveBtn) saveBtn.disabled = true;
      if (saveBtnText) saveBtnText.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...';

      let successful = 0;
      let errors = 0;

      for (const horario of pendingHorarios) {
        try {
          const result = await this.saveSchedule(horario);
          if (result.success) {
            successful++;
            this.markAsExisting(horario);
          } else {
            errors++;
          }
        } catch (error) {
          errors++;
        }
      }

      pendingHorarios = [];

      if (saveBtn) saveBtn.disabled = false;
      if (saveBtnText) saveBtnText.textContent = 'Guardar Cambios';
      this.updateCounters();

      if (errors === 0) {
        notificationManager.show('success', 'Guardado exitoso', `Se guardaron ${successful} horarios correctamente.`);
      } else {
        notificationManager.show('warning', 'Guardado parcial', `${successful} guardados, ${errors} fallaron.`);
      }
    }

    async saveSchedule(horarioData) {
      const payload = {
        grado_id: horarioData.grado_id,
        asignatura_id: horarioData.asignatura_id,
        profesor_id: horarioData.profesor_id,
        dia: horarioData.dia,
        hora_inicio: horarioData.hora_inicio,
        hora_fin: horarioData.hora_fin,
        _token: CSRF
      };

      try {
        const response = await fetch(ROUTES.horarios_store, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: JSON.stringify(payload)
        });

        if (!response.ok) {
          throw new Error(`HTTP ${response.status}`);
        }

        const json = await response.json();

        if (json.success && json.horario && json.horario.id) {
          horarioData.cell.dataset.horarioId = json.horario.id;
        }

        return { success: !!json.success };
      } catch (error) {
        console.error('Error guardando:', error);
        return { success: false };
      }
    }

    markAsExisting(schedule) {
      const slot = schedule.cell.querySelector('.class-slot');
      if (slot) {
        slot.classList.remove('pending');
        slot.classList.add('existing');
        const status = slot.querySelector('.slot-status');
        if (status) {
          status.classList.remove('pending');
          status.classList.add('existing');
        }
      }
      savedHorarios.push(schedule);
    }

    async removeSchedule(btnElement) {
      if (!confirm('¿Eliminar este horario?')) return;

      const cell = btnElement.closest('.dropzone');
      const isExisting = cell.dataset.horarioId;

      if (isExisting) {
        try {
          const response = await fetch(`/admin/horarios/${cell.dataset.horarioId}`, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': CSRF,
              'X-Requested-With': 'XMLHttpRequest'
            }
          });

          if (!response.ok) {
            notificationManager.show('error', 'Error', 'No se pudo eliminar el horario.');
            return;
          }
        } catch (error) {
          notificationManager.show('error', 'Error de conexión', 'No se pudo conectar con el servidor.');
          return;
        }
      }

      this.clearCell(cell);
      this.updateCounters();
      notificationManager.show('success', 'Eliminado', 'Horario eliminado correctamente.');
    }

    clearCell(cell) {
      cell.classList.remove('occupied', 'has-existing');
      delete cell.dataset.asignaturaId;
      delete cell.dataset.userId;
      delete cell.dataset.horarioId;

      const day = cell.dataset.dia;
      const time = cell.dataset.inicio;

      cell.innerHTML = `
    <div class="slot-placeholder">
      <div class="placeholder-day">${day}</div>
      <div class="placeholder-time">${time}</div>
      <div class="placeholder-action">Arrastra aquí</div>
    </div>
  `;
    }

    clearSchedule() {
      document.querySelectorAll('.dropzone').forEach(cell => {
        this.clearCell(cell);
      });
      pendingHorarios = [];
      savedHorarios = [];
      existingHorarios = [];
      this.updateCounters();
    }

    resetSchedule() {
      if (!confirm('¿Reiniciar el horario? Se perderán los cambios no guardados.')) return;

      this.clearSchedule();
      CURRENT_NIVEL_ID = null;
      CURRENT_GRADO_ID = null;
      CURRENT_GRADO_DATA = null;
      nivelSelect.value = '';
      gradoSelect.value = '';
      gradoSelect.disabled = true;
      scheduleSubtitle.textContent = 'Selecciona un grado para comenzar';
      this.hideStatus();
      breaksManager.updateBreaksInfo();
      notificationManager.show('info', 'Vista reiniciada', 'El horario ha sido reiniciado.');
    }

    async downloadPDF() {
      if (!CURRENT_GRADO_ID) {
        notificationManager.show('warning', 'Selecciona un grado', 'Debes seleccionar un grado para descargar su horario.');
        return;
      }

      notificationManager.show('info', 'Generando PDF', 'Preparando el documento para descarga...');

      // Aquí iría la lógica de generación de PDF
      // Por simplicidad, se omite la implementación completa
      alert('Función de descarga PDF - Implementar según necesidad');
    }

    showTeacherSelection() {
      return new Promise((resolve) => {
        const modal = new bootstrap.Modal(document.getElementById('teacherModal'));
        const select = document.getElementById('teacherSelect');

        select.innerHTML = '<option value="">Seleccione un profesor</option>';
        PROFESORES.forEach(p => {
          const option = document.createElement('option');
          option.value = p.id;
          option.textContent = p.name;
          select.appendChild(option);
        });

        modal.show();

        const confirmBtn = document.getElementById('confirmTeacher');
        confirmBtn.onclick = () => {
          modal.hide();
          resolve(select.value || null);
        };

        document.getElementById('teacherModal').addEventListener('hidden.bs.modal', function handler() {
          this.removeEventListener('hidden.bs.modal', handler);
          resolve(null);
        });
      });
    }

    updateCounters() {
      const pendingCountVal = pendingHorarios.length;
      const savedCountVal = savedHorarios.length + existingHorarios.length;

      if (pendingCount) pendingCount.textContent = pendingCountVal;
      if (savedCount) savedCount.textContent = savedCountVal;

      if (scheduleCounter) {
        scheduleCounter.innerHTML = `<span class="badge bg-light text-dark">${savedCountVal + pendingCountVal} clases programadas</span>`;
      }

      if (pendingCountVal > 0) {
        if (saveBtn) {
          saveBtn.disabled = false;
          saveBtn.classList.add('primary');
        }
        if (saveBtnText) {
          saveBtnText.textContent = `Guardar ${pendingCountVal} cambio${pendingCountVal > 1 ? 's' : ''}`;
        }
      } else {
        if (saveBtn) {
          saveBtn.disabled = true;
          saveBtn.classList.remove('primary');
        }
        if (saveBtnText) {
          saveBtnText.textContent = 'Guardar Cambios';
        }
      }
    }

    showLoadingStatus() {
      if (loadingStatus) loadingStatus.classList.remove('d-none');
      if (scheduleStatus) scheduleStatus.classList.add('d-none');
    }

    hideLoadingStatus() {
      if (loadingStatus) loadingStatus.classList.add('d-none');
    }

    showScheduleStatus() {
      const totalSchedules = existingHorarios.length + savedHorarios.length;

      if (scheduleStatus) {
        scheduleStatus.innerHTML = `
      <i class="fas fa-info-circle"></i>
      <span>${CURRENT_GRADO_DATA.nombre}: ${totalSchedules} clases programadas</span>
    `;
        scheduleStatus.classList.remove('d-none');
      }
    }

    hideStatus() {
      if (scheduleStatus) scheduleStatus.classList.add('d-none');
      if (loadingStatus) loadingStatus.classList.add('d-none');
    }

    getProfessorName(id) {
      const profesor = PROFESORES.find(p => String(p.id) === String(id));
      return profesor?.name || 'Profesor';
    }
  }
  // ========================================
  // INICIALIZACIÓN
  // ========================================
  window.notificationManager = new NotificationManager();
  window.breaksManager = new BreaksManager();
  window.scheduleManager = new EnterpriseScheduleManager();
  console.log('Sistema de Horarios con Descansos por Nivel/Grado inicializado');
});
