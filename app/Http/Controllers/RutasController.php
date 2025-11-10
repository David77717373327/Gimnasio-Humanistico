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

    public function mostrarcontenidosimbolosinstitucionales()
    {
        return view('Institucion.Simbolos');
    }

    public function mostrarcontenidomisionyvision()
    {
        return view('Institucion.Mision_vision');
    }

    public function mostrarcontenidoprincipiosyvarolres() {
        return view('Institucion.Principios_y_valores');
    }


    public function mostrarcontenidofilosofiainstitucional()
    {
        return view('Institucion.Filosofia_institucional');
    }

    public function mostrarcontenidopoliticadecalidad()
    {
        return view('Organización.Politica_de_calidad');
    }









    //Rutas para mostras contenido de ORGANIZACION 

        public function mostrarcontenidoorganigrama()
    {
        return view('Organización.organigrama');
    }    


     public function mostrarcontenidoGrupohumanistico()
    {
        return view('Organización.Grupo_humanistico');
    } 

    public function mostrarcontenidoGobiernoescolar()
    {
        return view('Organización.Gobierno_escolar');
    }













    public function mostrarcontenidoadmision()
    {
        return view('admision.admision');
    }

    public function mostrarcontenidoprecolar()
    {
        return view('niveles.prescolar');
    }

    public function mostrarcontenidobasicaprimaria()
    {
        return view('niveles.basica_primaria');
    }
    public function mostrarcontenidobasicasegundaria()

    {
        return view('niveles.basica_segundaria');
    }

    public function mostrarcontenidomediaacademica ()

    {
        return view('niveles.media_academica');
    }
 

        public function mostrarcontenidotranporte ()
        {
            return view('Vida_Estudiantil.transporte');
        }



}
