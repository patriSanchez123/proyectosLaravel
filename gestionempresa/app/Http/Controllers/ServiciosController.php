<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\Empleado_Servicio;

class ServiciosController extends Controller
{   
    /**
     * Función que retorna todos servicios que tiene un empleado
     */
    public function showEmpleadoServicios($idServicio){
        $empleados=Servicio::find($idServicio)->empleados;
        $servicio=Servicio::find($idServicio);
        return view('empleados',compact('empleados','servicio'));
    }
/**
 * Función que muestra los servicios que no tiene el empleado, para la selección 
 * de servicios, no se repita el servicio con los servicios que ya tiene asignado
 */
    public function showServicios($empleado){

    //ES UNA MANERA FEA DE HACER ESTO PERO HE SABIDO HACER ESTO DE OTRA MANERA
        $servicios=Servicio::all();
        $empleado_servicios=$servicio= Empleado_Servicio::where('empleado_id',$empleado)->select('servicio_id')->get();
        //recorremos los servicios
        foreach($servicios as $clave =>$servicio){
            //recorremos la tabla pivote
            foreach($empleado_servicios as $empleado_servicio ){
                //si el servicio del empleado tiene el mismo id lo borramos 
                if($servicio->id === $empleado_servicio->servicio_id){
                    unset($servicios[$clave]);
                }
            }
        }
        
        return view('incluirEmpleadoServicio',compact('servicios','empleado'));
    }

    /**
     * Función donde retorna la vista para poder añadir el servicio
     */
    public function aniadirServicio($recinto){

        return view('storeServicio',compact('recinto'));
    }

    /**
     * Función donde añade un nuevo servicio  y redirecciona a añadir un empleado
     * para ese servicio
     */
    public function serviciosStore($recinto, Request $request){

        $validate=  $request->validate([
            'tipoServicio' => 'required',
            'horasMensuales' =>'required',
            'precio'=>'required',
            'descripcion'=>'required'
            ]);
        
        $servicio= new Servicio();
        $servicio->tiposervicio = $request->tipoServicio;
        $servicio->tiempominutos =intval($request->horasMensuales);
        $servicio->descripcion = $request->descripcion;
        $servicio->precio = intval($request->precio);
        $servicio->recinto_id=$recinto;
        $servicio->save();
        
       return redirect()->route('nuevoServicio.empleado',$servicio->id);
            
    }

    /**
     * Función donde añade a la tabla pivote el servicio y los empleados correspondientes
     */
    public function anidadirNuevoServicioEmpleado(Request $request,Servicio $servicio){
        $empleados=$request->empleados;
        //recorremos los empleados y los añadimos a la tabla pivote
        foreach($empleados as $empleado){
            $servicios=Servicio::find($servicio->id)->empleados()->attach([$empleado]);
        }

        return redirect()->route('recintos.servicios',[$servicio->recinto_id]);
    }

    /**
     * Función donde elimina un servicio
     */
    public function destroyServicio(Servicio $servicio,$recinto){
        $servicio->delete();
        return redirect()->route('recintos.servicios',[$recinto]);

    }

    /**
     * Función donde retorna la vista para editar el servicio
     */
    public function editServicio(Servicio $servicio, $recinto){

        return view('servicioEdit',compact('servicio','recinto'));
    }

    /**
     * Función donde se edita el servicio
     */
    public function updateServicio(Servicio $servicio, $recinto,Request $request){

        $validate=  $request->validate([
            'tipoServicio' => 'required',
            'horasMensuales' =>'required',
            'precio'=>'required',
            'descripcion'=>'required'
            ]);

        $servicio->tiposervicio = $request->tipoServicio;
        $servicio->tiempominutos = $request->horasMensuales;
        $servicio->precio = $request->precio;
        $servicio->descripcion = $request->descripcion;
        $servicio->save();

        return redirect()->route('recintos.servicios',[$recinto]);

    }

    
}

