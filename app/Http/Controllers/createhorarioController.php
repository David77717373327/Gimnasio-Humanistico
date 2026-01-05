<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use App\Models\Grado;
use App\Models\Asignatura;
use App\Models\Horario;
use App\Models\Descanso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CreateHorarioController extends Controller
{
    public function create()
    {
        try {
            Log::info("📌 Cargando vista crear horario");

            $niveles = Nivel::orderBy('nombre')->get();
            $asignaturas = Asignatura::orderBy('nombre')->get();

            $profesores = User::where('role', 'professor')
                ->orderBy('name')
                ->get();

            Log::info("✔ Datos cargados: niveles={$niveles->count()}, asignaturas={$asignaturas->count()}, profesores={$profesores->count()}");

            $dias = ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];

            return view('admin.horarios.create', compact(
                'niveles', 'asignaturas', 'profesores', 'dias'
            ));

        } catch (\Exception $e) {
            Log::error('❌ Error al cargar formulario: '.$e->getMessage());
            return back()->with('error','Error al cargar el formulario.');
        }
    }

    public function store(Request $request)
    {
        Log::info("📥 Datos recibidos en store(): ", $request->all());

        // Validación del formulario
        $validated = $request->validate([
            'nivel_id' => 'required|exists:niveles,id',
            'grado_id' => 'required|exists:grados,id',
            'asignatura_id' => 'required|exists:asignaturas,id',
            'profesor_id' => 'nullable|exists:users,id',
            'dia' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        Log::info("✔ Validación correcta", $validated);

        try {
            DB::beginTransaction();
            Log::info("🔄 Iniciando transacción...");

            // Validar nivel - grado
            $grado = Grado::findOrFail($validated['grado_id']);
            Log::info("✔ Grado encontrado: ID={$grado->id}, nivel_id={$grado->nivel_id}");

            if ($grado->nivel_id != $validated['nivel_id']) {
                Log::warning("⚠ Error: El grado no pertenece al nivel.");
                return back()->withInput()->withErrors([
                    'grado_id' => 'El grado seleccionado no pertenece al nivel.'
                ]);
            }

            // Validar conflicto de horarios
            Log::info("🔎 Buscando conflicto de horarios...");
            $conflictoHorario = Horario::where('grado_id', $validated['grado_id'])
                ->where('dia', $validated['dia'])
                ->where(function($q) use ($validated) {
                    $q->whereBetween('hora_inicio', [$validated['hora_inicio'], $validated['hora_fin']])
                      ->orWhereBetween('hora_fin', [$validated['hora_inicio'], $validated['hora_fin']])
                      ->orWhere(function($q2) use ($validated) {
                          $q2->where('hora_inicio', '<=', $validated['hora_inicio'])
                             ->where('hora_fin', '>=', $validated['hora_fin']);
                      });
                })
                ->exists();

            Log::info("Resultado conflicto horario: ".($conflictoHorario ? "❌ SÍ" : "✔ NO"));

            if ($conflictoHorario) {
                return back()->withInput()->withErrors([
                    'hora_inicio' => 'Ya existe un horario en este día y hora para este grado.'
                ]);
            }

            // Validar descanso del grado
            Log::info("🔎 Verificando descanso del grado...");
            $descanso = Descanso::where('grado_id', $validated['grado_id'])
                ->where(function($q) use ($validated) {
                    $q->whereBetween('hora_inicio', [$validated['hora_inicio'], $validated['hora_fin']])
                      ->orWhereBetween('hora_fin', [$validated['hora_inicio'], $validated['hora_fin']])
                      ->orWhere(function($q2) use ($validated) {
                          $q2->where('hora_inicio', '<=', $validated['hora_inicio'])
                             ->where('hora_fin', '>=', $validated['hora_fin']);
                      });
                })
                ->first();

            Log::info("Resultado verificación descanso: ".($descanso ? "❌ CHOQUE" : "✔ NO HAY CHOQUE"));

            if ($descanso) {
                return back()->withInput()->withErrors([
                    'hora_inicio' => "El horario se solapa con el descanso del grado ({$descanso->hora_inicio} - {$descanso->hora_fin})."
                ]);
            }

            // Validar profesor
            if (!empty($validated['user_id'])) {
                Log::info("🔎 Revisando disponibilidad del profesor ID={$validated['user_id']}...");

                $conflictoProfesor = Horario::where('profesor_id', $validated['profesor_id'])
                    ->where('dia', $validated['dia'])
                    ->where(function($q) use ($validated) {
                        $q->whereBetween('hora_inicio', [$validated['hora_inicio'], $validated['hora_fin']])
                          ->orWhereBetween('hora_fin', [$validated['hora_inicio'], $validated['hora_fin']])
                          ->orWhere(function($q2) use ($validated) {
                              $q2->where('hora_inicio', '<=', $validated['hora_inicio'])
                                 ->where('hora_fin', '>=', $validated['hora_fin']);
                          });
                    })
                    ->exists();

                Log::info("Resultado conflicto profesor: ".($conflictoProfesor ? "❌ OCUPADO" : "✔ DISPONIBLE"));

                if ($conflictoProfesor) {
                    return back()->withInput()->withErrors([
                        'user_id' => 'El profesor ya tiene una clase en ese horario.'
                    ]);
                }
            }

            // Guardar horario
            Log::info("💾 Guardando nuevo horario...");

            Horario::create([
                'grado_id' => $validated['grado_id'],
                'asignatura_id' => $validated['asignatura_id'],
                'profesor_id' => $validated['profesor_id'],
                'dia' => $validated['dia'],
                'hora_inicio' => $validated['hora_inicio'],
                'hora_fin' => $validated['hora_fin'],
            ]);

            DB::commit();
            Log::info("🎉 Horario creado exitosamente");

            return redirect()->route('admin.horarios.index')
                ->with('success', 'Horario creado exitosamente.');

        } catch (\Exception $e) {

            DB::rollBack();

            Log::error("❌ ERROR EN EXCEPCIÓN");
            Log::error("Mensaje: ".$e->getMessage());
            Log::error("Archivo: ".$e->getFile());
            Log::error("Línea: ".$e->getLine());
            Log::error("Trace: ".$e->getTraceAsString());

            return back()->withInput()->withErrors([
                'error' => 'Error inesperado al crear el horario.'
            ]);
        }
    }

    // AJAX: Traer grados del nivel
    public function getGrados($nivelId)
    {
        Log::info("📡 Solicitando grados del nivel ID={$nivelId}");
        
        $nivel = Nivel::findOrFail($nivelId);
        
        return response()->json([
            'success' => true,
            'grados' => $nivel->grados()->orderBy('nombre')->get()
        ]);
    }

    // AJAX: Traer descansos del grado
    public function getDescansos($gradoId)
    {
        Log::info("📡 Solicitando descansos del grado ID={$gradoId}");

        $grado = Grado::findOrFail($gradoId);

        return response()->json([
            'success' => true,
            'descansos' => $grado->descansos()->get()
        ]);
    }
}
