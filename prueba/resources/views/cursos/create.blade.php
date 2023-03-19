
@extends('layout.plantilla')

@section('title','crear')

@section('content')
<h1>aqui puedes crearte un curso</h1>
<form action="{{route('cursos.store')}}" method="POST" >
    <!--Agrega un input oculto y agrega un token-->
        @csrf

<label for="">Nombre:<br><input type="text" name="nombre"></label><br>
<label for="">Descripcion:<br><textarea rows="5" name="descripcion"></textarea></label><br>
<label for="">Categoria:<br><input type="text" name="categoria"></label><br>
<input type="submit" value="Enviar">
</form>
@endsection

