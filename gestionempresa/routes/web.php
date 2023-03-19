<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\RecintosController;
use App\Http\Controllers\ServiciosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Rutas que tiene por defecto JetStream no he querido modi
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//shows
Route::get('clientes', [ClientesController::class, 'showClientes'])->name("clientes");
Route::get('clientes/recintos/{idCLiente}',[ClientesController::class,'showResintosCliente'])->name("clientes.recintos");
Route::get('clientes/recintos/servicios/{idRecinto}',[RecintosController::class,'showServiciosRecinto'])->name("recintos.servicios");
Route::get('servicios/empleados/{idServicio}',[ServiciosController::class,'showEmpleadoServicios'])->name('servicios.empleados');
Route::get('empleados',[EmpleadosController::class,'showEmpleados'])->name('empleados');
Route::get('empleados/servicios/{idEmpleado}',[EmpleadosController::class,'showServiciosEmpleados'])->name('empleados.servicios');

//crear empleados
Route::get('empleados/crear',[EmpleadosController::class,'formularioCrearEmpleado'])->name('formulario.empleado');
Route::post('empleados/crear',[EmpleadosController::class,'storeEmpleado'])->name('empleados.crear');

//añadir servicios al trabajador
Route::get('iniadir/servicio/{empleado}',[ServiciosController::class,'showServicios'])->name('aniadir.servicio');
Route::post('anidir/servicio/empleado',[EmpleadosController::class,'anidadirServicioEmpleado'])->name('aniadir.servicio.empleado');

//quitar servicio al empleado "Quita la relación de la tabla pivote"
Route::delete('empleado/servicio/{empleado}/{servicio}',[EmpleadosController::class,'destroyServicioEmpleado'])->name('empleado.servicio.destroy');

//Elimina al empleado
Route::delete('empleado/eliminar/{empleado}',[EmpleadosController::class,'destroyEmpleado'])->name('empleado.destroy');

//Edita al empleado
Route::get('empleado/editar/{empleado}',[EmpleadosController::class,'editEmpleado'])->name('empleado.edit');
Route::put('empleado/{empleado}',[EmpleadosController::class,'updateEmpleado'])->name('empleado.update');

//Edita al cliente
Route::get('cliente/editar/{cliente}',[ClientesController::class,'editCliente'])->name('cliente.edit');
Route::put('cliente/{cliente}',[ClientesController::class,'updateCliente'])->name('cliente.update');

//Elimina al cliente
Route::delete('cliente/eliminar/{cliente}',[ClientesController::class,'destroyCliente'])->name('cliente.destroy');

//Añade a un nuevo cliente
Route::get('cliente/aniadir',[ClientesController::class,'aniadirCliente'])->name('formulario.cliente');
Route::post('cliente/aniadir',[ClientesController::class,'clienteStore'])->name('cliente.store');
//añadir el inmueble, servicio, empleado
Route::get('cliente/recinto/aniadir/{cliente}',[RecintosController::class,'aniadirRecinto'])->name('formulario.recinto');

//añade un nuevo inmueble o recinto al cliente
Route::post('cliente/aniadir/{cliente}',[RecintosController::class,'recintoStore'])->name('recinto.store');

//Añade un nuevo servicio al inmueble de un cliente
Route::get('recinto/servicio/{recinto}',[ServiciosController::class,'aniadirServicio'])->name('formualario.servicio');
Route::post('recinto/servicio/{recinto}',[ServiciosController::class,'serviciosStore'])->name('servicio.store');

//Cuando ser crea un nuevo servicio al inmueble hay que asignarle un trabajor
Route::get('recinto/servicio/empleado/{servicio}',[EmpleadosController::class,'empleadoNuevoServicio'])->name('nuevoServicio.empleado');
Route::post('recinto/servicio/empleado/{servicio}',[ServiciosController::class,'anidadirNuevoServicioEmpleado'])->name('aniadir.nuevoServicioEmpleado');

//Elimina un inmueble del cliente "una vez que se elimine el inmueble se elimina los servicios"
Route::delete('recinto/eliminar/{recinto}/{cliente}',[RecintosController::class,'destroyRecinto'])->name('recinto.destroy');

//Edita el servicio
Route::get('recinto/editar/{recinto}/{cliente}',[RecintosController::class,'editRecinto'])->name('recinto.edit');
Route::put('recinto/{recinto}/{cliente}',[RecintosController::class,'updateRecinto'])->name('recinto.update');

//Elimina el servicio del cliente
Route::delete('servicio/eliminar/{servicio}/{recinto}',[ServiciosController::class,'destroyServicio'])->name('servicio.destroy');

//Edita el servicio del cliente
Route::get('servicio/editar/{servicio}/{recinto}',[ServiciosController::class,'editServicio'])->name('servicio.edit');
Route::put('servicio/editar/{servicio}/{recinto}',[ServiciosController::class,'updateServicio'])->name('servicio.update');
