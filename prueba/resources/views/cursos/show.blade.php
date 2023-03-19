@extends('layout.plantilla')

@section('title','crear'.$curso->name)

@section('content')
<a href="{{route('cursos.index')}}">Volver</a><br>
<a href="{{route('cursos.edit',$curso)}}">Editar curso</a>
<h1>Bienvenidos al curso {{$curso->name}}</h1>
<p><strong>Categoria:{{$curso->categoria}}</strong></p>
<p>Descripcion:{{$curso->descripcion}}</p>

@endsection