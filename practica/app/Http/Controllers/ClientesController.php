<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    function mostrarDatos(){
        return view('mostrarClientes');
    }
}
