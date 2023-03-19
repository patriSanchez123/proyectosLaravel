<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Función para visualizar todos los empleados
     */
    public function showEmpleados(){
        $empleados= Empleado::all();
        return view('empleados',compact('empleados'));
    }

    /**
     * Función para visualizar los servicios de los empleados dependiendo del
     * id del mismo
     */
    public function showServiciosEmpleados($idEmpleado){
        $servicios=Empleado::find($idEmpleado)->servicios;
        $empleado=Empleado::find($idEmpleado);
            return view('servicios',compact('empleado','servicios'));
        }

    /**
     * Función que retorna la vista para crear al empleado
     */
    public function formularioCrearEmpleado(){
        return view('storeEmpleado');
    }

    /**
     * Función para crear un nuevo empleado
     */
    public function storeEmpleado(Request $request){

      $validate=  $request->validate([
            'nombre' => 'required',
            'apellidos' =>'required',
            'nif' => 'required|regex:/(^[0-9]{8}[a-zA-Z]$)/u',
            'ss' => 'required',
            'telefono'=>'required|regex:/(^[0-9]{9}$)/u',
            'tipoContrato'=>'required',
            'sueldo'=>'required'

            ]);

        $empleado=new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellidos = $request->apellidos;
        $empleado->nif = $request->nif;
        $empleado->ss = $request->ss;
        $empleado->telefono = $request->telefono;
        $empleado->sueldo = floatval($request->sueldo);
        $empleado->tipocontrato = $request->tipoContrato;
        $empleado->save();
        return redirect()->route('aniadir.servicio',$empleado->id);
        

    }

    /**
     * Función para añadir un servicio al empleado
     */
    public function anidadirServicioEmpleado(Request $request){

        $servicios=$request->servicios;
        $idEmpleado=$request->empleado;
        $empleado=Empleado::find($idEmpleado);

        //Recorremos los servicios para insertarlo en la tabla pivote
        foreach($servicios as $servicio){
        //añade en la tabla pivote    
        $empleado->servicios()->attach([$servicio]);
        }

        return redirect()->route('empleados.servicios',$idEmpleado);
    }

    /**
     * Función para eliminar un servicio de un empleado
     */
    public function destroyServicioEmpleado($empleado,$servicio){

        $empleado=Empleado::find($empleado);
        //quita de la tabla pivote
        $empleado->servicios()->detach($servicio);

        return redirect()->route('empleados.servicios',$empleado);
        
    }

    /**
     * Función para eliminar al empleado
     */
    public function destroyEmpleado($empleado){

        $empleado = Empleado::find($empleado)->delete();
        return redirect()->route('empleados');

    }
    /***
     * Función que retorna a la vista para editar al empleado
     */
    public function editEmpleado(Empleado $empleado){
        return view('empleadoEdit',compact('empleado'));
    }
    
    /**
     * Función para editar al empleado
     */
    public function updateEmpleado(Empleado $empleado, Request $request){

        $validate=  $request->validate([
            'nombre' => 'required',
            'apellidos' =>'required',
            'nif' => 'required|regex:/(^[0-9]{8}[a-zA-Z]$)/u',
            'ss' => 'required',
            'telefono'=>'required|regex:/(^[0-9]{9}$)/u',
            'tipoContrato'=>'required',
            'sueldo'=>'required'

            ]);
        
        $empleado->nombre=$request->nombre;
        $empleado->apellidos=$request->apellidos;
        $empleado->nif=$request->nif;
        $empleado->ss=$request->ss;
        $empleado->telefono=$request->telefono;
        $empleado->tipoContrato=$request->tipoContrato;
        $empleado->sueldo=$request->sueldo;
        $empleado->save();
        return redirect()->route('empleados');

    }

    /**
     * Función donde retorna a la vista donde aparecen todos los empleados para
     * añadirlo al nuevo servicio
     */
    public function empleadoNuevoServicio($servicio){

        $empleados= Empleado::all();
        return view('empleadoNuevoServicio',compact('empleados','servicio'));
       

    }

   

}
