<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Mostrar listado de niveles
     */
    public function index()
    {
        $niveles = Nivel::withCount('grados')
                       ->orderBy('nombre', 'asc')
                       ->paginate(15);
        
        return view('Admin.niveles.index', compact('niveles'));
    }

    /**
     * Mostrar formulario para crear nivel
     */
    public function create()
    {
        return view('Admin.niveles.create');
    }

    /**
     * Guardar nuevo nivel
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255|unique:niveles,nombre'
        ], [
            'nombre.required' => 'El nombre del nivel es obligatorio',
            'nombre.unique' => 'Este nivel ya existe',
            'nombre.max' => 'El nombre no puede exceder 255 caracteres'
        ]);

        try {
            $nivel = Nivel::create($data);
            
            // Si es petición AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Nivel creado exitosamente',
                    'nivel' => $nivel
                ]);
            }

            return redirect()->route('admin.niveles.index')
                           ->with('success', 'Nivel creado exitosamente');
                           
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear el nivel: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error al crear el nivel')
                        ->withInput();
        }
    }

    /**
     * Mostrar formulario para editar nivel
     */
    public function edit(Nivel $nivel)
    {
        // Si es petición AJAX, devolver datos del nivel
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'nivel' => $nivel
            ]);
        }

        return view('Admin.niveles.edit', compact('nivel'));
    }

    /**
     * Actualizar nivel
     */
    public function update(Request $request, Nivel $nivel)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255|unique:niveles,nombre,' . $nivel->id
        ], [
            'nombre.required' => 'El nombre del nivel es obligatorio',
            'nombre.unique' => 'Este nivel ya existe',
            'nombre.max' => 'El nombre no puede exceder 255 caracteres'
        ]);

        try {
            $nivel->update($data);
            
            // Si es petición AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Nivel actualizado exitosamente',
                    'nivel' => $nivel
                ]);
            }

            return redirect()->route('admin.niveles.index')
                           ->with('success', 'Nivel actualizado exitosamente');
                           
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al actualizar el nivel: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error al actualizar el nivel')
                        ->withInput();
        }
    }

    /**
     * Eliminar nivel
     */
    public function destroy(Nivel $nivel)
    {
        try {
            // Verificar si tiene grados asociados
            if ($nivel->grados()->exists()) {
                if (request()->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'No se puede eliminar el nivel porque tiene grados asociados'
                    ], 400);
                }
                
                return back()->with('error', 'No se puede eliminar el nivel porque tiene grados asociados');
            }

            $nivel->delete();
            
            // Si es petición AJAX
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Nivel eliminado exitosamente'
                ]);
            }

            return redirect()->route('admin.niveles.index')
                           ->with('success', 'Nivel eliminado exitosamente');
                           
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al eliminar el nivel: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error al eliminar el nivel');
        }
    }
}