<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Modulo;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    //Función que crea el alumno y le asigna un modulo
    function createAlumno($idCurso, Request $request){
        //Instanciamos el alumno para crearlo y guardarlo en la base de datos
        $alumno = new Alumno();
        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->email = $request->email;
        $alumno->save();

        //instanciamos modulo para insertarlo en la tabla intermedia
        $modulo=Modulo::find($idCurso);
        $modulo->alumnos()->attach([$alumno->id]);

        return redirect()->route('show.alumnos',$idCurso);

    }
}
