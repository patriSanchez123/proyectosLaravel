
@extends('layout.plantilla')


@section('title','home')


@section('content')

<h1 class="mt-5 display-5">Seleccione los servicios al trabajador</h1>

<table class="table mt-3">
<thead>
    <tr>
        <!---Tengo que añadirle los dias por semana que se realiza-->
      <th scope="col">Id servicio</th>
      <th scope="col">Tipo de servicio</th>
      <th scope="col">Descripcion</th>      
    </tr>
  </thead>
  <tbody>
<form action="{{route('aniadir.servicio.empleado')}}" method="post">
  @csrf
@foreach ($servicios as $servicio)
    <tr>
    <th scope="row">{{$servicio->id}}</th>
    <td>{{$servicio->tiposervicio}}</td>
    <td>{{$servicio->descripcion}}</td>
    <td><input type="checkbox" name="servicios[]" value="{{$servicio->id}}"></td>
    <input type="hidden" name="empleado" value="{{$empleado}}">
    
</tr>
@endforeach

</tbody>
</table>
<input type="submit" value="Añadir servicios" class="btn btn-outline-primary mt-3 mb-5">
</form>
@endsection

