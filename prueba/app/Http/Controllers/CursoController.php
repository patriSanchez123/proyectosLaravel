<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class CursoController extends Controller
{
   /**en este caso para indicar las carpertas de le pone un punto y despues se le 
    * se le añade el archivo o la siguiente carpeta*/   
     public function index(){

      //Para mostrar de manera paginada
      $cursos = Curso::orderBy('id','desc')->paginate();

     
        return view('cursos.index',compact('cursos'));
     }

     public function create(){
      return view('cursos.create');
   }

   public function store (Request $request){
      $curso = new Curso();
      $curso->name= $request->nombre;
      $curso->descripcion= $request->descripcion;
      $curso->categoria= $request->categoria;
      $curso->save();
      //redirecionar a la pagina, en este caso no hace falta poner el curso->id
      //laravel lo interpreta solo que tiene que poner el id
      return redirect()->route('cursos.show',$curso);
   }

//La vaiable que vamos a recibir por la ruta se la añadimos al método
//La variable hay que añadirla dentro de un array

//otro metodo de pasar la variable 
     public function show(Curso $curso){
      //return view('cursos.show',['curso' =>$curso]);
      //Recuperar registro por su id
      
   //para añadir una variable compact('curso')
      return view('cursos.show',compact('curso'));
     }
   //Si se añade delante de la id el objeto curso,laravel entiende que tiene que hacer una instancia 
   // del curso por el id
   //En este caso por menos confusión lo hacemos con el objeto curso
   public function edit (Curso $curso){
      //para añadir una variable compact('curso')
   return view('cursos.edit',compact('curso'));
   }
   public function update(Request $request, Curso $curso){
      $curso->name= $request->nombre;
      $curso->descripcion= $request->descripcion;
      $curso->categoria= $request->categoria;
      $curso->save();

      return redirect()->route('cursos.show',$curso);
   }
}
 