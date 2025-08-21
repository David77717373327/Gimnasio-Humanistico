<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
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
}


