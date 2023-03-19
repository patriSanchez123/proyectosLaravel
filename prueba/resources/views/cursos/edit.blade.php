@extends('layout.plantilla')

@section('title','Editar')

@section('content')
<h1>Aqui podras editar un curso</h1>
<!--Para añadir el metodo put hay que dejarle definido el metodo post ya que html no reconoce el
metodo put y posteriormente añadirle la directiva para que lavarel reconosca el metodo put-->
<form action="{{route('cursos.update',$curso)}}" method="POST" >
    <!--Agrega un input oculto y agrega un token-->
        @csrf
    <!--Directiva para el metodo put-->
        @method('put')

<label for="">
    Nombre:
    <br>
    <input type="text" name="nombre" value="{{$curso->name}}">
</label><br>
<label for="">
    Descripcion:
    <br>
    <!--Para llenar un text area no se puede pasar por el value si no por el mismo text area--->
    <textarea rows="5" name="descripcion">{{$curso->descripcion}}</textarea>
    </label><br>
<label for="">
    Categoria:
    <br>
    <input type="text" name="categoria" value="{{$curso->categoria}}">
</label><br>
<input type="submit" value="Actualizar Formulario">
</form>
@endsection
