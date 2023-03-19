<?php

namespace App\Http\Controllers;

use App\Models\Recinto;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class RecintosController extends Controller
{   
    /**
     * Función donde se muestran los servicios del recinto
     */
    public function showServiciosRecinto($idRecinto){
        $servicios=Recinto::find($idRecinto)->servicios;
        $recinto=Recinto::find($idRecinto);
        return view('servicios',compact('servicios','recinto'));
    }

    /**
     * Función donde retorna la vista para añadir un nuevo recinto
     */
    public function aniadirRecinto($cliente){
       return view('storeRecinto',compact('cliente'));
    }

    /**
     * Función donde se crear un nuevo recinto y redirecciona al formulario del nuevo
     * servicio para añadirle un servicio al recinto
     */
    public function recintoStore($cliente, Request $request){

        $validate=  $request->validate([
            'direccion' => 'required',
            'tipoRecinto' =>'required',
            'telefono'=>'required|regex:/(^[0-9]{9}$)/u',
            'descripcion'=>'required'
            ]);
        
        $recinto= new Recinto();
        $recinto->direccion = $request->direccion;
        $recinto->tiporecinto = $request->tipoRecinto;
        $recinto->descripcion = $request->descripcion;
        $recinto->telefono = $request->telefono;
        $recinto->cliente_id=$cliente;
        $recinto->save();
        
        return redirect()->route('formualario.servicio',[$recinto->id]);

    }

    /**
     * Funciión para eliminar un recinto
     */
    public function destroyRecinto(Recinto $recinto,$cliente){

      $recinto->delete();
         return redirect()->route('clientes.recintos',[$cliente]);
    }

    /**
     * Función que retorna a la vista para editar el recinto
     */
    public function editRecinto(Recinto $recinto,$cliente){
        return view('recintoEdit',compact('recinto','cliente'));
    }

    /**
     * Función donde se edita al recinto
     */
    public function updateRecinto($recinto,$cliente, Request $request){

        $validate=  $request->validate([
            'direccion' => 'required',
            'tipoRecinto' =>'required',
            'telefono'=>'required|regex:/(^[0-9]{9}$)/u',
            'descripcion'=>'required'
            ]);

        $recinto=Recinto::find($recinto);
        $recinto->direccion = $request->direccion;
        $recinto->tiporecinto = $request->tipoRecinto;
        $recinto->descripcion = $request->descripcion;
        $recinto->telefono = $request->telefono;
        $recinto->save();
            
        return redirect()->route('clientes.recintos',$cliente);
         

    }
}
