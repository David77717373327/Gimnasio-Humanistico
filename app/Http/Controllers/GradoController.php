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

        Grado::create($data);
        return redirect()->route('admin.grados.index')->with('success', 'Grado creado correctamente.');
    }

    public function edit(Grado $grado)
    {
        return view('Admin.grados.edit', compact('grado'));
    }

    public function update(Request $request, Grado $grado)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:50|unique:grados,nombre,' . $grado->id,
        ]);

        $grado->update($data);
        return redirect()->route('admin.grados.index')->with('success', 'Grado actualizado correctamente.');
    }

    public function destroy(Grado $grado)
    {
        if ($grado->horarios()->exists()) {
            return back()->with('error', 'No puedes eliminar el grado: tiene horarios asociados.');
        }
        $grado->delete();
        return redirect()->route('admin.grados.index')->with('success', 'Grado eliminado.');
    }
}
