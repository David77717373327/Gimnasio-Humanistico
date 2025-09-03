<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfesorController extends Controller
{
    // Listar Profesores
    public function listarProfesores()
    {
        Log::info('Entrando a listarProfesores');
        $profesores = User::where('role', 'professor')->get();
        Log::info('Profesores encontrados:', ['count' => $profesores->count()]);
        return view('admin.profesores.index', compact('profesores'));
    }

    // Crear Profesor
    public function crearProfesor(Request $request)
    {
        Log::info('Petición recibida en crearProfesor', $request->all());

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'document' => 'required|string|max:50|unique:users,document',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:6'
            ]);

            Log::info('Validación pasada, creando profesor...');

            $profesor = User::create([
                'name' => $request->name,
                'document' => $request->document,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'professor',
            ]);

            Log::info('Profesor creado correctamente', [
                'id' => $profesor->id,
                'email' => $profesor->email
            ]);

            return redirect()->route('admin.profesores.index')->with('success', 'Profesor creado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error en crearProfesor: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withErrors(['error' => 'No se pudo crear el profesor. Revisa los logs.']);
        }
    }

    // Editar Profesor
    public function editarProfesor(Request $request, $id)
    {
        Log::info('Petición recibida en editarProfesor', ['id' => $id, 'data' => $request->all()]);

        try {
            $profesor = User::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'document' => 'required|string|max:50|unique:users,document,' . $profesor->id,
                'email' => 'required|string|email|max:255|unique:users,email,' . $profesor->id,
                'password' => 'nullable|string|min:6'
            ]);

            $profesor->name = $request->name;
            $profesor->document = $request->document;
            $profesor->email = $request->email;

            if ($request->password) {
                $profesor->password = Hash::make($request->password);
            }

            $profesor->save();

            Log::info('Profesor actualizado correctamente', ['id' => $profesor->id]);

            return redirect()->route('admin.profesores.index')->with('success', 'Profesor actualizado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error en editarProfesor: ' . $e->getMessage());
            return back()->withErrors(['error' => 'No se pudo actualizar el profesor.']);
        }
    }

    // Eliminar Profesor
    public function eliminarProfesor($id)
    {
        Log::info('Petición recibida en eliminarProfesor', ['id' => $id]);

        try {
            $profesor = User::findOrFail($id);
            $profesor->delete();

            Log::info('Profesor eliminado correctamente', ['id' => $id]);

            return redirect()->route('admin.profesores.index')->with('success', 'Profesor eliminado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error en eliminarProfesor: ' . $e->getMessage());
            return back()->withErrors(['error' => 'No se pudo eliminar el profesor.']);
        }
    }
}
