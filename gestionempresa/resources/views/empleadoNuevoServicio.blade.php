@extends('layout.plantilla')


@section('title','Agregar empleadoa servicio')


@section('content')

<h1 class="mt-5 display-5">Seleccione los servicios al trabajador</h1>

<table class="table mt-3">
<thead>
    <tr>
        <!---Tengo que añadirle los dias por semana que se realiza-->
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">NIF</th>
      <th scope="col">Telefono</th>
      <th scope="col">Tipo contrato</th>

    </tr>
  </thead>
  <tbody>
<form action="{{route('aniadir.nuevoServicioEmpleado', $servicio)}}" method="post">
  @csrf
@foreach ($empleados as $empleado)
    <tr>
    <th scope="row">{{$empleado->id}}</th>
    <td>{{$empleado->nombre}}</td>
    <td>{{$empleado->apellidos}}</td>
    <td>{{$empleado->nif}}</td>
    <td>{{$empleado->telefono}}</td>
    <td>{{$empleado->tipocontrato}}</td>
    <td><input type="checkbox" name="empleados[]" value="{{$empleado->id}}"></td>
    {{-- <input type="hidden" name="servicio" value="{{$servicio}}"> --}}
    
</tr>
@endforeach

</tbody>
</table>
<input type="submit" value="Añadir empleados a servicio" class="btn btn-outline-primary mt-3 mb-5">
</form>
@endsection