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
    public function mostrarContenidoProfesor()
    {
        return view('professor.index');
    }




    //Rutas para mostrar contenido de Quienes Somos
    public function mostrarcontenidohistoria()
    {
        return view('Institucion.quienes_somos');
    }

    public function mostrarcontenidomisionyvision()
    {
        return view('Institucion.Mision_vision');
    }


    public function mostrarcontenidofilosofiainstitucional()
    {
        return view('Institucion.Filosofia_institucional');
    }

    public function mostrarcontenidoadmision()
    {
        return view('admision.admision');
    }



}

