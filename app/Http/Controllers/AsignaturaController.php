<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AsignaturaController extends Controller
{
    public function index()
    {
        Log::info('Accediendo al método index de AsignaturaController');
        $asignaturas = Asignatura::orderBy('nombre')->paginate(15);
        Log::debug('Asignaturas obtenidas', ['count' => $asignaturas->count()]);
        return view('Admin.asignaturas.index', compact('asignaturas'));
    }

    public function create()
    {
        Log::info('Accediendo al método create de AsignaturaController');
        return view('Admin.asignaturas.create');
    }

    public function store(Request $request)
    {
        Log::info('Inicio del método store de AsignaturaController', ['request_data' => $request->all()]);

        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:100|unique:asignaturas,nombre',
            ]);
            Log::debug('Datos validados', ['data' => $data]);

            $asignatura = Asignatura::create($data);
            Log::info('Asignatura creada exitosamente', ['asignatura_id' => $asignatura->id]);

            if ($request->ajax()) {
                Log::debug('Respondiendo a petición AJAX para store');
                return response()->json([
                    'success' => true,
                    'message' => 'Asignatura creada correctamente.',
                    'asignatura' => $asignatura
                ]);
            }

            return redirect()->route('admin.asignaturas.index')->with('success', 'Asignatura creada correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al crear asignatura', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear la asignatura: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error al crear la asignatura.');
        }
    }

    public function edit(Asignatura $asignatura)
    {
        Log::info('Accediendo al método edit de AsignaturaController', ['asignatura_id' => $asignatura->id]);

        if (request()->ajax()) {
            Log::debug('Respondiendo a petición AJAX para edit');
            return response()->json([
                'success' => true,
                'asignatura' => $asignatura
            ]);
        }

        return view('Admin.asignaturas.edit', compact('asignatura'));
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        Log::info('Inicio del método update de AsignaturaController', [
            'asignatura_id' => $asignatura->id,
            'request_data' => $request->all()
        ]);

        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:100|unique:asignaturas,nombre,' . $asignatura->id,
            ]);
            Log::debug('Datos validados para actualización', ['data' => $data]);

            $asignatura->update($data);
            Log::info('Asignatura actualizada exitosamente', ['asignatura_id' => $asignatura->id]);

            if ($request->ajax()) {
                Log::debug('Respondiendo a petición AJAX para update');
                return response()->json([
                    'success' => true,
                    'message' => 'Asignatura actualizada correctamente.',
                    'asignatura' => $asignatura
                ]);
            }

            return redirect()->route('admin.asignaturas.index')->with('success', 'Asignatura actualizada correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar asignatura', [
                'asignatura_id' => $asignatura->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al actualizar la asignatura: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error al actualizar la asignatura.');
        }
    }

    public function show(Asignatura $asignatura)
    {
        Log::info('Accediendo al método show de AsignaturaController', ['asignatura_id' => $asignatura->id]);

        if (request()->ajax()) {
            Log::debug('Respondiendo a petición AJAX para show');
            return response()->json([
                'success' => true,
                'asignatura' => $asignatura
            ]);
        }

        return view('Admin.asignaturas.show', compact('asignatura'));
    }

    public function destroy(Asignatura $asignatura)
    {
        Log::info('Inicio del método destroy de AsignaturaController', ['asignatura_id' => $asignatura->id]);

        try {
            if ($asignatura->horarios()->exists()) {
                Log::warning('Intento de eliminación de asignatura con horarios asociados', ['asignatura_id' => $asignatura->id]);

                if (request()->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'No puedes eliminar la asignatura: tiene horarios asociados.'
                    ], 422);
                }
                return back()->with('error', 'No puedes eliminar la asignatura: tiene horarios asociados.');
            }

            $asignatura->delete();
            Log::info('Asignatura eliminada exitosamente', ['asignatura_id' => $asignatura->id]);

            if (request()->ajax()) {
                Log::debug('Respondiendo a petición AJAX para destroy');
                return response()->json([
                    'success' => true,
                    'message' => 'Asignatura eliminada correctamente.'
                ]);
            }

            return redirect()->route('admin.asignaturas.index')->with('success', 'Asignatura eliminada.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar asignatura', [
                'asignatura_id' => $asignatura->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al eliminar la asignatura: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error al eliminar la asignatura.');
        }
    }
}