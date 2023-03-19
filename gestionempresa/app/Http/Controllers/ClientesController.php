<?php


namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Recinto;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    
    /**
     * Función para visualizar todos los clientes
     */
    public function showClientes(){
        $clientes= Cliente::all();
        return view('clientes',compact('clientes'));
    }

    /**
     * Función para visualizar los recintos del un cliente
     */
    public function showResintosCliente($idCliente){
       // $recintos= Cliente;
        $recintosCliente=Cliente::find($idCliente)->recintos;
        $cliente=Cliente::find($idCliente);

        return view('recintos',compact('recintosCliente','cliente'));
    }

    /**
     * Función que retorna a la vista editar al cliente
     */
    public function editCliente(Cliente $cliente){

        return view('clienteEdit',compact('cliente'));
    }

    /**
     * Función para editar al cliente
     */
    public function updateCliente(Request $request, Cliente $cliente){

        $validate=  $request->validate([
            'nombre' => 'required',
            'apellidos' =>'required',
            'telefono'=>'required|regex:/(^[0-9]{9}$)/u',
            'email'=>'required'

            ]);
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->save();

        return redirect()->route('clientes');
    }

    /**
     * Función para eliminar al cliente
     */
    public function destroyCliente(Cliente $cliente){
        $cliente->delete();
        return redirect()->route('clientes');
    }

    /**
     * Función que retorna la vista para agregar al cliente
     */
    public function aniadirCliente(){
        return view('storeCliente');
    }

    /**
     * Función para crear un nuevo cliente
     */
    public function clienteStore(Request $request){
        $cliente= new Cliente();

        $validate=  $request->validate([
            'nombre' => 'required',
            'apellidos' =>'required',
            'telefono'=>'required|regex:/(^[0-9]{9}$)/u',
            'email'=>'required'

            ]);
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->save();
        return redirect()->route('formulario.recinto',$cliente->id);
    }
}
