
@extends('layout.plantilla')


@section('title','home')


@section('content')
<h1 class="mt-5 mb-5 display-5">Clientes</h1>
<a class="btn btn-primary" href="{{route('formulario.cliente')}}" role="button"><i class="fa-solid fa-plus"></i>Añadir cliente</a>
<table class="table mt-5">
<thead>
    <tr>
        <th scope="col">Id cliente</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Telefono</th>
      <th scope="col">Email</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
   
@foreach ($clientes as $cliente)
{{-- <p>{{$cliente->nombre}}</p>     --}}

      

  <tr>
    <th scope="row">{{$cliente->id}}</th>
    <td>{{$cliente->nombre}}</td>
    
    <td>{{$cliente->apellidos}}</td>
    <td>{{$cliente->telefono}}</td>
    <td>{{$cliente->email}}</td>
    
    <td><a href="{{route('clientes.recintos',$cliente)}}" class="btn btn-outline-primary">Ver inmuelbles</a></td>
    
    <form action="{{route('cliente.edit',$cliente)}}" method="get">
      @csrf
      <td><input class="btn btn-outline-primary" type="submit" name="editar" value='Editar cliente'></td>
      </form>
      <form action="{{route('cliente.destroy',$cliente)}}" method="post">
        @csrf
        @method('DELETE')
    <td><input class="btn btn-outline-danger" type="submit" name="eliminar" value='Eliminar cliente'></td>
    </form>
  </tr>
@endforeach
</tbody>
</table>

@endsection

