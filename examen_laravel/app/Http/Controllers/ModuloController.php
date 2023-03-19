<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    //Función para listar los alumnos de un modulo por su id
    function showAlumnos($id){

        //Función donde buscamos el modulo y mostra todos los modulos
        $alumnos=Modulo::find($id)->alumnos;
        //retorna a la vista y pasa las variables alumnos e id
        return view('showAlumnos',compact('alumnos','id'));
    }
}
