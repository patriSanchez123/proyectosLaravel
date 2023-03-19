@extends('layout.plantilla')

@section('title','bienvenido')

@section('content')
<h1> Bienvenidos al curso</h1>
<!--Estamos llamando a la ruta desde el nombre que especificamos en la misma--->
<a href="{{route('cursos.create')}}">Crear curso</a>
<ul>
    @foreach ($cursos as $curso)
    <!--En el enlace lo que le estamos pasando es la url con el id del mismo-->
       <li><a href="{{route('cursos.show',$curso->id)}}">{{$curso->name}}</a></li>
       
    @endforeach
</ul>

<!--Para mostrar los link, estan incluidos tai-->
{{$cursos->links()}}
@endsection
