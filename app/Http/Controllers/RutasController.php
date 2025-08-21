<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RutasController extends Controller
{
    public function mostrarContenidoUsuario()
    {
        return view('usuario.welcome');
    }

    public function mostrarContenidoAdmin()
    {
        return view('admin.index');
    }
    
    public function mostrarContenidoEstudiante()
    {
        return view('student.index');
    }

    public function listarPendientes()
    {
        $pendientes = User::where('role', 'student')->where('is_approved', false)->get();
        return view('admin.estudiantes.pendientes', compact('pendientes'));
    }

    public function aprobarEstudiante($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();

        return back()->with('success', 'El estudiante fue aprobado correctamente.');
    }

    public function rechazarEstudiante($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('error', 'El estudiante fue rechazado.');
    }
}