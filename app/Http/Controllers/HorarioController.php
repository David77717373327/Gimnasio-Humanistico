<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Grado;
use App\Models\User;
use App\Models\Asignatura;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HorarioController extends Controller
{
    // Listado de horarios
    public function index()
    {
        try {
            $horarios = Horario::with(['grado', 'asignatura', 'user'])->get();
            Log::info('Horarios cargados', ['count' => $horarios->count()]);
            return view('admin.horarios.index', compact('horarios'));
        } catch (\Exception $e) {
            Log::error('Error en index de HorarioController', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Error al cargar los horarios.');
        }
    }

    // Formulario de creación
    public function create()
    {
        Log::info('Accediendo al método create de HorarioController', [
            'user_id' => Auth::id()
        ]);
        try {
            $grados = Grado::orderBy('nombre')->get();
            $asignaturas = Asignatura::orderBy('nombre')->get();
            $profesores = User::where('role', 'professor')
                             ->whereNull('deleted_at')
                             ->orderBy('name')
                             ->get();

            Log::info('Datos cargados para create', [
                'grados_count' => $grados->count(),
                'asignaturas_count' => $asignaturas->count(),
                'profesores_count' => $profesores->count()
            ]);

            if ($grados->isEmpty()) {
                Log::warning('No hay grados registrados, redirigiendo a grados.create');
                return redirect()->route('grados.create')
                    ->with('error', 'Primero crea al menos un Grado.');
            }
            if ($asignaturas->isEmpty()) {
                Log::warning('No hay asignaturas registradas, redirigiendo a asignaturas.create');
                return redirect()->route('asignaturas.create')
                    ->with('error', 'Primero crea al menos una Asignatura.');
            }
            if ($profesores->isEmpty()) {
                Log::warning('No hay profesores registrados, pero cargando vista de creación');
                // Permitir carga de la vista incluso sin profesores
            }

            return view('admin.horarios.create', compact('grados', 'asignaturas', 'profesores'));
        } catch (\Exception $e) {
            Log::error('Error en create de HorarioController', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('admin.horarios.index')
                ->with('error', 'Error al cargar el formulario de creación.');
        }
    }

    // Guardar horario
    public function store(Request $request)
    {
        Log::info('Accediendo al método store de HorarioController', [
            'input' => $request->all()
        ]);
        try {
            $request->validate([
                'grado_id' => 'required|exists:grados,id',
                'asignatura_id' => 'required|exists:asignaturas,id',
                'user_id' => 'nullable|exists:users,id',
                'dia' => 'required|string|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
                'hora_inicio' => 'required|date_format:H:i',
                'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            ]);

            if ($request->user_id) {
                $conflicto = Horario::where('user_id', $request->user_id)
                    ->where('dia', $request->dia)
                    ->where(function ($query) use ($request) {
                        $query->whereBetween('hora_inicio', [$request->hora_inicio, $request->hora_fin])
                              ->orWhereBetween('hora_fin', [$request->hora_inicio, $request->hora_fin])
                              ->orWhere(function ($q) use ($request) {
                                  $q->where('hora_inicio', '<=', $request->hora_inicio)
                                    ->where('hora_fin', '>=', $request->hora_fin);
                              });
                    })
                    ->exists();

                if ($conflicto) {
                    Log::warning('Conflicto de horario detectado', [
                        'user_id' => $request->user_id,
                        'dia' => $request->dia,
                        'hora_inicio' => $request->hora_inicio,
                        'hora_fin' => $request->hora_fin
                    ]);
                    return back()->withErrors(['user_id' => 'El profesor ya tiene un horario asignado en ese día y hora.']);
                }
            }

            $horario = Horario::create([
                'grado_id' => $request->grado_id,
                'asignatura_id' => $request->asignatura_id,
                'user_id' => $request->user_id,
                'dia' => $request->dia,
                'hora_inicio' => $request->hora_inicio,
                'hora_fin' => $request->hora_fin,
            ]);

            Log::info('Horario creado exitosamente', [
                'horario_id' => $horario->id
            ]);

            return redirect()->route('admin.horarios.index')->with('success', 'Horario registrado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error en store de HorarioController', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->all()
            ]);
            return back()->with('error', 'Error al registrar el horario.');
        }
    }

    // Formulario de edición
    public function edit(Horario $horario)
    {
        Log::info('Accediendo al método edit de HorarioController', [
            'horario_id' => $horario->id,
            'user_id' => Auth::id()
        ]);
        try {
            $grados = Grado::orderBy('nombre')->get();
            $asignaturas = Asignatura::orderBy('nombre')->get();
            $profesores = User::where('role', 'professor')
                             ->whereNull('deleted_at')
                             ->orderBy('name')
                             ->get();

            Log::info('Datos cargados para edit', [
                'grados_count' => $grados->count(),
                'asignaturas_count' => $asignaturas->count(),
                'profesores_count' => $profesores->count()
            ]);

            if ($grados->isEmpty()) {
                Log::warning('No hay grados registrados, redirigiendo a grados.create');
                return redirect()->route('grados.create')
                    ->with('error', 'Primero crea al menos un Grado.');
            }
            if ($asignaturas->isEmpty()) {
                Log::warning('No hay asignaturas registradas, redirigiendo a asignaturas.create');
                return redirect()->route('asignaturas.create')
                    ->with('error', 'Primero crea al menos una Asignatura.');
            }
            if ($profesores->isEmpty()) {
                Log::warning('No hay profesores registrados, pero cargando vista de edición');
            }

            return view('admin.horarios.edit', compact('horario', 'grados', 'asignaturas', 'profesores'));
        } catch (\Exception $e) {
            Log::error('Error en edit de HorarioController', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('admin.horarios.index')
                ->with('error', 'Error al cargar el formulario de edición.');
        }
    }

    // Actualizar horario
    public function update(Request $request, Horario $horario)
{
    Log::info('Accediendo al método update de HorarioController', [
        'horario_id' => $horario->id,
        'input' => $request->all()
    ]);
    try {
        $request->validate([
            'grado_id' => 'required|exists:grados,id',
            'asignatura_id' => 'required|exists:asignaturas,id',
            'user_id' => 'nullable|exists:users,id',
            'dia' => 'required|string|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
            'hora_inicio' => 'required|date_format:H:i:s,H:i', // Aceptar ambos formatos
            'hora_fin' => 'required|date_format:H:i:s,H:i|after:hora_inicio',
        ]);

        // Normalizar hora_inicio y hora_fin a H:i
        $horaInicio = date('H:i', strtotime($request->hora_inicio));
        $horaFin = date('H:i', strtotime($request->hora_fin));

        if ($request->user_id) {
            $conflicto = Horario::where('user_id', $request->user_id)
                ->where('dia', $request->dia)
                ->where('id', '!=', $horario->id)
                ->where(function ($query) use ($horaInicio, $horaFin) {
                    $query->whereBetween('hora_inicio', [$horaInicio, $horaFin])
                          ->orWhereBetween('hora_fin', [$horaInicio, $horaFin])
                          ->orWhere(function ($q) use ($horaInicio, $horaFin) {
                              $q->where('hora_inicio', '<=', $horaInicio)
                                ->where('hora_fin', '>=', $horaFin);
                          });
                })
                ->exists();

            if ($conflicto) {
                Log::warning('Conflicto de horario detectado al actualizar', [
                    'user_id' => $request->user_id,
                    'dia' => $request->dia,
                    'hora_inicio' => $horaInicio,
                    'hora_fin' => $horaFin
                ]);
                return back()->withErrors(['user_id' => 'El profesor ya tiene un horario asignado en ese día y hora.']);
            }
        }

        $horario->update([
            'grado_id' => $request->grado_id,
            'asignatura_id' => $request->asignatura_id,
            'user_id' => $request->user_id,
            'dia' => $request->dia,
            'hora_inicio' => $horaInicio,
            'hora_fin' => $horaFin,
        ]);

        Log::info('Horario actualizado exitosamente', [
            'horario_id' => $horario->id
        ]);

        return redirect()->route('admin.horarios.index')->with('success', 'Horario actualizado correctamente.');
    } catch (\Exception $e) {
        Log::error('Error en update de HorarioController', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'input' => $request->all()
        ]);
        return back()->with('error', 'Error al actualizar el horario: ' . $e->getMessage());
    }
}

// Eliminar horario
public function destroy(Horario $horario)
{
    Log::info('Accediendo al método destroy de HorarioController', [
        'horario_id' => $horario->id,
            'user_id' => Auth::id()
        ]);
        try {
            $horario->delete();
            Log::info('Horario eliminado exitosamente', ['horario_id' => $horario->id]);
            return redirect()->route('admin.horarios.index')->with('success', 'Horario eliminado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error en destroy de HorarioController', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('admin.horarios.index')->with('error', 'Error al eliminar el horario.');
        }
    }
}