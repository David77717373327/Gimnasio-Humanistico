<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{

     public function listarPendientes()
    {
        $pendientes = User::where('role', 'student')->where('is_approved', false)->get();
        return view('admin.estudiantes.pendientes', compact('pendientes'));
    }
    
    public function index()
    {
        $usuarios = User::all();
        return view('admin.estudiantes.index', compact('usuarios'));
    }

    public function listarUsuariosEliminados()
    {
        $eliminados = User::onlyTrashed()->get();
        return view('admin.estudiantes.eliminados', compact('eliminados'));
    }

    public function eliminarUsuario($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'Usuario eliminado correctamente (soft delete).');
    }

    public function restaurarUsuario($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return back()->with('success', 'Usuario restaurado correctamente.');
    }

    public function eliminarPermanente($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return back()->with('success', 'Usuario eliminado permanentemente.');
    }

   public function asignarProfesor($id)
{
    $usuario = User::find($id);

    if (!$usuario) {
        return redirect()->back()->with('error', 'Usuario no encontrado.');
    }

    if (trim(strtolower($usuario->role)) !== 'student') {
        return redirect()->back()->with('error', 'Este usuario no es un estudiante.');
    }

    $usuario->role = 'professor';
    $usuario->save();

    return redirect()->back()->with('success', 'El usuario ha sido asignado como Profesor.');
}

public function aprobar($id)
{
    $usuario = User::findOrFail($id);

    if ($usuario->role === 'student') {
        $usuario->is_approved = true;
        $usuario->save();
        return back()->with('success', 'El estudiante fue aprobado correctamente.');
    }

    return back()->with('error', 'Solo se pueden aprobar estudiantes.');
}

public function rechazar($id)
{
    $usuario = User::findOrFail($id);

    if ($usuario->role === 'student') {
        $usuario->is_approved = false;
        $usuario->save();
        return back()->with('error', 'El estudiante fue rechazado.');
    }

    return back()->with('error', 'Solo se pueden rechazar estudiantes.');
}

}