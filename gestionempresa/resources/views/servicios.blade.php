
@extends('layout.plantilla')


@section('title','Servicios')


@section('content')
@if(Route::has('recintos.servicios') && isset($recinto))

<h1 class="mt-5 display-5">Servicios inmueble Dirección: {{$recinto->direccion}}</h1>
<a class="btn btn-primary mt-5 mb-5" href="{{route('formualario.servicio',$recinto)}}" role="button"><i class="fa-solid fa-plus"></i>Añadir servicio</a>

@endif

@if(Route::has('empleados.servicios') && isset($empleado))

<h1 class="mt-5 display-5">Servicios {{$empleado->nombre}} {{$empleado->apellidos}}</h1>
<a class="btn btn-primary mt-5 mb-5" href="{{route('aniadir.servicio',$empleado)}}" role="button"><i class="fa-solid fa-plus"></i>Añadir servicio</a>

@endif

<table class="table mt-3">
<thead>
    <tr>
        <!---Tengo que añadirle los dias por semana que se realiza-->
      <th scope="col">Id servicio</th>
      <th scope="col">Tipo de servicio</th>
      <th scope="col">Horas mensuales</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>

      
    </tr>
  </thead>
  <tbody>

@foreach ($servicios as $servicio)
    <tr>
    <th scope="row">{{$servicio->id}}</th>
    <td>{{$servicio->tiposervicio}}</td>
    <td>{{$servicio->tiempominutos}}</td>
    <td>{{$servicio->descripcion}}</td>
    <td>{{$servicio->precio}}€</td>

    @if(Route::has('recintos.servicios') && isset($recinto))

    <td><a class="btn btn-outline-primary" href="{{route('servicios.empleados',$servicio)}}">Empleados</a></td>

      <form action="{{route('servicio.edit',[$servicio,$recinto])}}" method="get">
        @csrf
        @method('put')
        <td><input class="btn btn-outline-primary" type="submit" name="editar" value="Editar servicio"></td>  
      </form>

      <form action="{{route('servicio.destroy',[$servicio,$recinto])}}" method="post">
        @csrf
        @method('delete')
          <td><input class="btn btn-outline-danger" type="submit" name="eliminar" value="Eliminar servicio"></td>
        </form> 

    @endif

    @if(Route::has('empleados.servicios') && !isset($recinto))

    <form action="{{route('empleado.servicio.destroy',['empleado'=>$empleado , 'servicio'=>$servicio])}}" method="post">
      @csrf
      @method('DELETE')
      <td><input class="btn btn-outline-primary" type="submit" name="eliminar" value='Quitar servicio'></td>
    </form>
      @endif
</tr>

@endforeach

</tbody>
</table>

@endsection

