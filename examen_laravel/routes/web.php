<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ModuloController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//funcion donde se lista los alumnos y muestra el formulario
Route::get('modulos/{id}/alumnos',[ModuloController::class,'showAlumnos'])->name('show.alumnos');
//función donde crea el nuevo alumno
Route::post('create/{id}/alumno',[AlumnoController::class,'createAlumno'])->name('create.alumno');