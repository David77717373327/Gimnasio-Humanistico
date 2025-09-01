<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::orderBy('nombre')->paginate(15);
        return view('Admin.grados.index', compact('grados'));
    }

    public function create()
    {
        return view('Admin.grados.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:50|unique:grados,nombre',
        ]);

        $grado = Grado::create($data);
        
        // Si es una petición AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Grado creado correctamente.',
                'grado' => $grado
            ]);
        }

        return redirect()->route('admin.grados.index')->with('success', 'Grado creado correctamente.');
    }

    public function edit(Grado $grado)
    {
        // Si es una petición AJAX, devolver los datos del grado
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'grado' => $grado
            ]);
        }

        return view('Admin.grados.edit', compact('grado'));
    }

    public function update(Request $request, Grado $grado)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:50|unique:grados,nombre,' . $grado->id,
        ]);

        $grado->update($data);
        
        // Si es una petición AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Grado actualizado correctamente.',
                'grado' => $grado
            ]);
        }

        return redirect()->route('admin.grados.index')->with('success', 'Grado actualizado correctamente.');
    }

    public function destroy(Grado $grado)
    {
        if ($grado->horarios()->exists()) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No puedes eliminar el grado: tiene horarios asociados.'
                ]);
            }
            return back()->with('error', 'No puedes eliminar el grado: tiene horarios asociados.');
        }
        
        $grado->delete();
        
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Grado eliminado correctamente.'
            ]);
        }
        
        return redirect()->route('admin.grados.index')->with('success', 'Grado eliminado.');
    }

// 1. BÚSQUEDA EN TIEMPO REAL
// Añadir al GradoController



public function search(Request $request)
{
    $query = $request->get('q');
    
    $grados = Grado::when($query, function ($q) use ($query) {
        return $q->where('nombre', 'like', "%{$query}%");
    })
    ->orderBy('nombre')
    ->paginate(15);

    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'html' => view('Admin.grados.partials.table_rows', compact('grados'))->render(),
            'pagination' => $grados->links()->toHtml()
        ]);
    }

    return view('Admin.grados.index', compact('grados'));
}


// 4. DUPLICAR GRADO
public function duplicate(Grado $grado)
{
    $newGrado = $grado->replicate();
    $newGrado->nombre = $grado->nombre . ' - Copia';
    
    // Asegurar que el nombre sea único
    $counter = 1;
    while (Grado::where('nombre', $newGrado->nombre)->exists()) {
        $newGrado->nombre = $grado->nombre . ' - Copia ' . $counter;
        $counter++;
    }
    
    $newGrado->save();

    if (request()->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'Grado duplicado correctamente.',
            'grado' => $newGrado
        ]);
    }

    return redirect()->route('admin.grados.index')
           ->with('success', 'Grado duplicado correctamente.');
}

// 5. ACTIVAR/DESACTIVAR GRADOS (si tienes un campo 'activo')
public function toggleStatus(Grado $grado)
{
    // Asumiendo que tienes un campo 'activo' en tu tabla
    $grado->activo = !$grado->activo;
    $grado->save();

    if (request()->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'Estado del grado actualizado.',
            'grado' => $grado
        ]);
    }

    return redirect()->route('admin.grados.index')
           ->with('success', 'Estado del grado actualizado.');
}
}