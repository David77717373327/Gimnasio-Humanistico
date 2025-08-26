<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::orderBy('nombre')->paginate(15);
        return view('Admin.asignaturas.index', compact('asignaturas'));
    }

    public function create()
    {
        return view('Admin.asignaturas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100|unique:asignaturas,nombre',
        ]);

        Asignatura::create($data);
        return redirect()->route('admin.asignaturas.index')->with('success', 'Asignatura creada correctamente.');
    }

    public function edit(Asignatura $asignatura)
    {
        return view('Admin.asignaturas.edit', compact('asignatura'));
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100|unique:asignaturas,nombre,' . $asignatura->id,
        ]);

        $asignatura->update($data);
        return redirect()->route('admin.asignaturas.index')->with('success', 'Asignatura actualizada correctamente.');
    }

    public function destroy(Asignatura $asignatura)
    {
        if ($asignatura->horarios()->exists()) {
            return back()->with('error', 'No puedes eliminar la asignatura: tiene horarios asociados.');
        }
        $asignatura->delete();
        return redirect()->route('admin.asignaturas.index')->with('success', 'Asignatura eliminada.');
    }
}
