<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;

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

Route::get('/',HomeController::class);



Route::controller(CursoController::class)->group(function(){
//Añadiendole la propiedad name le estamos indicando un nombre
//identificativo para poder llamarlo desde la vista
Route::get('cursos', 'index')->name('cursos.index');
Route::get('cursos/create','create')->name("cursos.create");
//cuando se manda la información del formulario ruta tipo `post
Route::post('cursos','store')->name("cursos.store");
Route::post('cursos', 'store')->name('cursos.store');
Route::get('cursos/{curso}','show')->name("cursos.show");
//Se le añade la url en la ruta para poder rellenar los datos del formulario
//para poder editarlo
Route::get('cursos/{curso}/edit','edit')->name("cursos.edit");
Route::put('cursos/{curso}','update')->name("cursos.update");
    
});

// Route::get('cursos/{curso}/{categoria}',function($curso,$categoria){
//     return "Esto es la ruta 3 añadiendo rutas en el navegador: $curso con la categoria $categoria";
//     //en el navegador
// //http://127.0.0.1:8000/cursos
// });

//Para no tener que declarar tantas rutas se le añade ? en la variable para indicar que es opcional
//y se le añade el valor, si no existiera la variable
// Route::get('cursos/{curso}/{categoria?}',function($curso,$categoria = null){
//     if($categoria){
//         return "El curso que está accediendo es:  $curso con la categoria $categoria";
//     }else{

//     }
//     return "El curso que está accediendo es:  $curso";
//     //en el navegador
// //http://127.0.0.1:8000/cursos
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
