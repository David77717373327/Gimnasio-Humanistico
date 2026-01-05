<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Grado;
use App\Models\Nivel;
use App\Models\Asignatura;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class HorarioController extends Controller
{
    /**
     * Mostrar listado de horarios con filtros
     */
    public function index(Request $request)
    {
        try {
            Log::info('Index - Parámetros recibidos:', $request->all());

            // Consulta principal con relaciones correctas
            $query = Horario::with(['grado.nivel', 'asignatura', 'profesor']);

            // Aplicar filtros
            $this->aplicarFiltros($query, $request);

            // Obtener horarios paginados
            $horarios = $query->orderBy('dia')
                ->orderBy('hora_inicio')
                ->paginate(15);

            // Horarios filtrados cuando se selecciona un grado
            $todosHorarios = $this->obtenerHorariosFiltrados($request);

            // TODOS los horarios (sin filtros)
            $todosLosHorarios = Horario::with(['grado.nivel', 'asignatura', 'profesor'])
                ->orderBy('dia')
                ->orderBy('hora_inicio')
                ->get();

            // Datos para los filtros
            $niveles = Nivel::with('grados')->orderBy('nombre')->get();
            $grados = $this->obtenerGradosFiltrados($request);
            $asignaturas = Asignatura::orderBy('nombre')->get();
            $profesores = $this->obtenerProfesoresActivos();
            $dias = $this->obtenerDiasSemana();

            Log::info('Datos cargados correctamente', [
                'horarios_count' => $horarios->total(),
                'grados_count'   => $grados->count(),
                'niveles_count'  => $niveles->count()
            ]);

            return view('admin.horarios.index', compact(
                'horarios',
                'todosHorarios',
                'todosLosHorarios',
                'niveles',
                'grados',
                'asignaturas',
                'profesores',
                'dias'
            ));

        } catch (\Exception $e) {

            Log::error('Error en index de HorarioController', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->with('error', 'Error al cargar los horarios: ' . $e->getMessage());
        }
    }


    // =======================================================
    // MÉTODOS AUXILIARES
    // =======================================================

    /**
     * Aplicar filtros dinámicos a la consulta
     */
    private function aplicarFiltros($query, Request $request)
    {
        // Nivel
        if ($request->filled('nivel_id')) {
            $query->whereHas('grado', function ($q) use ($request) {
                $q->where('nivel_id', $request->nivel_id);
            });
        }

        // Grado
        if ($request->filled('grado_id')) {
            $query->where('grado_id', $request->grado_id);
        }

        // Día
        if ($request->filled('dia')) {
            $query->where('dia', $request->dia);
        }

        // Asignatura
        if ($request->filled('asignatura_id')) {
            $query->where('asignatura_id', $request->asignatura_id);
        }
    }

    /**
     * Obtener horarios filtrados por grado
     */
    private function obtenerHorariosFiltrados(Request $request)
    {
        if ($request->filled('grado_id')) {
            return Horario::with(['grado.nivel', 'asignatura', 'profesor'])
                ->where('grado_id', $request->grado_id)
                ->orderBy('dia')
                ->orderBy('hora_inicio')
                ->get();
        }

        return collect();
    }

    /**
     * Obtener grados según el filtro activo
     */
    private function obtenerGradosFiltrados(Request $request)
    {
        // Si se seleccionó un grado → devolver grados del mismo nivel
        if ($request->filled('grado_id')) {
            $grado = Grado::find($request->grado_id);

            if ($grado) {
                return Grado::where('nivel_id', $grado->nivel_id)
                    ->with('nivel')
                    ->orderBy('nombre')
                    ->get();
            }
        }

        // Si se seleccionó un nivel
        if ($request->filled('nivel_id')) {
            return Grado::where('nivel_id', $request->nivel_id)
                ->with('nivel')
                ->orderBy('nombre')
                ->get();
        }

        // Sin filtros → todos los grados
        return Grado::with('nivel')->orderBy('nombre')->get();
    }

    /**
     * Obtener profesores activos
     */
    private function obtenerProfesoresActivos()
    {
        return User::where('role', 'professor')
            ->whereNull('deleted_at')
            ->orderBy('name')
            ->get();
    }

    /**
     * Días disponibles
     */
    private function obtenerDiasSemana()
    {
        return ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    }

    // =======================================================
    // MÉTODOS AJAX
    // =======================================================

    /**
     * Obtener grados de un nivel (AJAX)
     */
    public function getGrados($nivel)
    {
        try {
            $grados = Grado::where('nivel_id', $nivel)
                ->orderBy('nombre')
                ->get(['id', 'nombre']);

            return response()->json([
                'success' => true,
                'grados'  => $grados
            ]);

        } catch (\Exception $e) {

            Log::error('getGrados(): ERROR', [
                'nivel_id' => $nivel,
                'error'    => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}



