
@extends('layout.plantilla')


@section('title','home')


@section('content')
@if(Route::has('clientes.recintos'))
<h1 class="mt-5 display-5">Inmuebles cliente {{$cliente->nombre}} {{$cliente->apellidos}}</h1>

<a class="btn btn-primary mt-5" href="{{route('formulario.recinto',$cliente)}}" role="button"><i class="fa-solid fa-plus"></i>Añadir inmueble</a>

@else
<h1 class="mt-5 display-5">Inmuebles</h1>
@endif

<table class="table mt-5">
<thead>
    <tr>
        <th scope="col">Id recinto</th>
      <th scope="col">Dirección</th>
      <th scope="col">Tipo de recinto</th>
      <th scope="col">Descripción</th>
      <th scope="col">Teléfono administrador inmueble</th>
      
    </tr>
  </thead>
  <tbody>

@foreach ($recintosCliente as $recinto)
    <tr>
    <th scope="row">{{$recinto->id}}</th>
    <td><a href="#">{{$recinto->direccion}}</a></td>
    <td><a href="#">{{$recinto->tiporecinto}}</a></td>
    <td><a href="#">{{$recinto->descripcion}}</a></td>
    <td><a href="#">{{$recinto->telefono}}</a></td>
    {{-- recinto.destroy --}}

    <td><a class="btn btn-outline-primary" href="{{route('recintos.servicios',$recinto)}}">Servicios</a></td>
    
    <form action="{{route('recinto.edit',[$recinto,$cliente])}}" method="get">
      @csrf
      <td><input class="btn btn-outline-primary" type="submit" name="editar" value='Editar inmueble'></td>
  </form>

    <form action="{{route('recinto.destroy',[$recinto,$cliente])}}" method="post">
      @csrf
      @method('DELETE')
  <td><input class="btn btn-outline-danger" type="submit" name="eliminar" value='Eliminar inmueble'></td>
  </form>

</tr>
@endforeach
</tbody>
</table>

@endsection

