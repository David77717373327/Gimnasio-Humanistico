<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GradoController extends Controller
{
    public function index()
    {
        Log::info('========== ÍNDICE DE GRADOS ==========');
        
        $grados = Grado::with('nivel')
                      ->orderBy('nivel_id')
                      ->orderBy('nombre')
                      ->paginate(15);
        
        $niveles = Nivel::orderBy('nombre')->get();
        
        Log::info('Total de grados encontrados: ' . $grados->count());
        Log::info('Total de niveles disponibles: ' . $niveles->count());
        
        return view('Admin.grados.index', compact('grados', 'niveles'));
    }

    public function create()
    {
        Log::info('========== CREAR GRADO - VISTA ==========');
        
        $niveles = Nivel::orderBy('nombre')->get();
        
        Log::info('Niveles disponibles para crear: ' . $niveles->count());
        
        return view('Admin.grados.create', compact('niveles'));
    }

    public function store(Request $request)
    {
        Log::info('========== ALMACENAR GRADO ==========');
        Log::info('Método HTTP: ' . $request->method());
        Log::info('Es AJAX: ' . ($request->ajax() ? 'SÍ' : 'NO'));
        Log::info('Datos recibidos:', $request->all());
        Log::info('Headers:', $request->headers->all());
        
        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:50|unique:grados,nombre',
                'nivel_id' => 'required|exists:niveles,id'
            ], [
                'nombre.required' => 'El nombre del grado es obligatorio',
                'nombre.unique' => 'Este grado ya existe',
                'nombre.max' => 'El nombre no puede exceder 50 caracteres',
                'nivel_id.required' => 'Debes seleccionar un nivel',
                'nivel_id.exists' => 'El nivel seleccionado no existe'
            ]);
            
            Log::info('Validación exitosa. Datos a guardar:', $data);

            $grado = Grado::create($data);
            
            Log::info('Grado creado con ID: ' . $grado->id);
            
            // Cargar relación nivel
            $grado->load('nivel');
            
            Log::info('Grado con nivel cargado:', $grado->toArray());
            
            // Si es una petición AJAX, devolver JSON
            if ($request->ajax()) {
                Log::info('Respondiendo con JSON (AJAX)');
                
                return response()->json([
                    'success' => true,
                    'message' => 'Grado creado correctamente.',
                    'grado' => $grado
                ]);
            }

            Log::info('Redirigiendo a índice (no AJAX)');
            
            return redirect()->route('admin.grados.index')
                           ->with('success', 'Grado creado correctamente.');
                           
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('========== ERROR DE VALIDACIÓN ==========');
            Log::error('Errores de validación:', $e->errors());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $e->errors()
                ], 422);
            }
            
            throw $e;
            
        } catch (\Exception $e) {
            Log::error('========== ERROR GENERAL AL CREAR ==========');
            Log::error('Mensaje: ' . $e->getMessage());
            Log::error('Archivo: ' . $e->getFile() . ':' . $e->getLine());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear el grado: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Error al crear el grado: ' . $e->getMessage());
        }
    }

    public function edit(Grado $grado)
    {
        Log::info('========== EDITAR GRADO ==========');
        Log::info('ID del grado: ' . $grado->id);
        Log::info('Es AJAX: ' . (request()->ajax() ? 'SÍ' : 'NO'));
        
        // Si es una petición AJAX, devolver los datos del grado
        if (request()->ajax()) {
            Log::info('Devolviendo datos del grado en JSON');
            
            return response()->json([
                'success' => true,
                'grado' => $grado->load('nivel')
            ]);
        }

        $niveles = Nivel::orderBy('nombre')->get();
        
        Log::info('Mostrando vista de edición');
        
        return view('Admin.grados.edit', compact('grado', 'niveles'));
    }

    public function update(Request $request, Grado $grado)
    {
        Log::info('========== ACTUALIZAR GRADO ==========');
        Log::info('Método HTTP: ' . $request->method());
        Log::info('ID del grado: ' . $grado->id);
        Log::info('Es AJAX: ' . ($request->ajax() ? 'SÍ' : 'NO'));
        Log::info('Datos recibidos:', $request->all());
        Log::info('Datos actuales del grado:', $grado->toArray());
        
        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:50|unique:grados,nombre,' . $grado->id,
                'nivel_id' => 'required|exists:niveles,id'
            ], [
                'nombre.required' => 'El nombre del grado es obligatorio',
                'nombre.unique' => 'Este grado ya existe',
                'nombre.max' => 'El nombre no puede exceder 50 caracteres',
                'nivel_id.required' => 'Debes seleccionar un nivel',
                'nivel_id.exists' => 'El nivel seleccionado no existe'
            ]);
            
            Log::info('Validación exitosa. Datos a actualizar:', $data);

            $grado->update($data);
            
            Log::info('Grado actualizado correctamente');
            
            // Cargar relación nivel
            $grado->load('nivel');
            
            Log::info('Grado actualizado con nivel:', $grado->toArray());
            
            // Si es una petición AJAX, devolver JSON
            if ($request->ajax()) {
                Log::info('Respondiendo con JSON (AJAX)');
                
                return response()->json([
                    'success' => true,
                    'message' => 'Grado actualizado correctamente.',
                    'grado' => $grado
                ]);
            }

            Log::info('Redirigiendo a índice (no AJAX)');
            
            return redirect()->route('admin.grados.index')
                           ->with('success', 'Grado actualizado correctamente.');
                           
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('========== ERROR DE VALIDACIÓN AL ACTUALIZAR ==========');
            Log::error('Errores de validación:', $e->errors());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $e->errors()
                ], 422);
            }
            
            throw $e;
            
        } catch (\Exception $e) {
            Log::error('========== ERROR GENERAL AL ACTUALIZAR ==========');
            Log::error('Mensaje: ' . $e->getMessage());
            Log::error('Archivo: ' . $e->getFile() . ':' . $e->getLine());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al actualizar: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Error al actualizar: ' . $e->getMessage());
        }
    }

    public function destroy(Grado $grado)
    {
        Log::info('========== ELIMINAR GRADO ==========');
        Log::info('ID del grado: ' . $grado->id);
        Log::info('Es AJAX: ' . (request()->ajax() ? 'SÍ' : 'NO'));
        
        try {
            if ($grado->horarios()->exists()) {
                Log::warning('Intento de eliminar grado con horarios asociados');
                
                if (request()->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'No puedes eliminar el grado: tiene horarios asociados.'
                    ]);
                }
                return back()->with('error', 'No puedes eliminar el grado: tiene horarios asociados.');
            }
            
            $grado->delete();
            
            Log::info('Grado eliminado correctamente');
            
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Grado eliminado correctamente.'
                ]);
            }
            
            return redirect()->route('admin.grados.index')
                           ->with('success', 'Grado eliminado.');
                           
        } catch (\Exception $e) {
            Log::error('========== ERROR AL ELIMINAR ==========');
            Log::error('Mensaje: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al eliminar: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Error al eliminar: ' . $e->getMessage());
        }
    }

    // BÚSQUEDA EN TIEMPO REAL
    public function search(Request $request)
    {
        Log::info('========== BÚSQUEDA DE GRADOS ==========');
        Log::info('Query: ' . $request->get('q'));
        
        $query = $request->get('q');
        
        $grados = Grado::with('nivel')
            ->when($query, function ($q) use ($query) {
                return $q->where('nombre', 'like', "%{$query}%")
                        ->orWhereHas('nivel', function($q) use ($query) {
                            $q->where('nombre', 'like', "%{$query}%");
                        });
            })
            ->orderBy('nivel_id')
            ->orderBy('nombre')
            ->paginate(15);

        Log::info('Resultados encontrados: ' . $grados->count());

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'html' => view('Admin.grados.partials.table_rows', compact('grados'))->render(),
                'pagination' => $grados->links()->toHtml()
            ]);
        }

        $niveles = Nivel::orderBy('nombre')->get();
        return view('Admin.grados.index', compact('grados', 'niveles'));
    }

    // DUPLICAR GRADO
    public function duplicate(Grado $grado)
    {
        Log::info('========== DUPLICAR GRADO ==========');
        Log::info('ID del grado original: ' . $grado->id);
        
        try {
            $newGrado = $grado->replicate();
            $newGrado->nombre = $grado->nombre . ' - Copia';
            
            // Asegurar que el nombre sea único
            $counter = 1;
            while (Grado::where('nombre', $newGrado->nombre)->exists()) {
                $newGrado->nombre = $grado->nombre . ' - Copia ' . $counter;
                $counter++;
            }
            
            $newGrado->save();
            $newGrado->load('nivel');
            
            Log::info('Grado duplicado con ID: ' . $newGrado->id);

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Grado duplicado correctamente.',
                    'grado' => $newGrado
                ]);
            }

            return redirect()->route('admin.grados.index')
                   ->with('success', 'Grado duplicado correctamente.');
                   
        } catch (\Exception $e) {
            Log::error('========== ERROR AL DUPLICAR ==========');
            Log::error('Mensaje: ' . $e->getMessage());
            
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al duplicar: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Error al duplicar: ' . $e->getMessage());
        }
    }

    // ACTIVAR/DESACTIVAR GRADOS
    public function toggleStatus(Grado $grado)
    {
        Log::info('========== CAMBIAR ESTADO DEL GRADO ==========');
        Log::info('ID: ' . $grado->id . ', Estado actual: ' . ($grado->activo ?? 'N/A'));
        
        try {
            $grado->activo = !$grado->activo;
            $grado->save();
            
            Log::info('Nuevo estado: ' . $grado->activo);

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Estado del grado actualizado.',
                    'grado' => $grado
                ]);
            }

            return redirect()->route('admin.grados.index')
                   ->with('success', 'Estado del grado actualizado.');
                   
        } catch (\Exception $e) {
            Log::error('========== ERROR AL CAMBIAR ESTADO ==========');
            Log::error('Mensaje: ' . $e->getMessage());
            
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al cambiar estado: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Error al cambiar estado: ' . $e->getMessage());
        }
    }
}