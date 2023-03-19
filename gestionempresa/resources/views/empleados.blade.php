
@extends('layout.plantilla')


@section('title','Empleados')


@section('content')
<h1 class="mt-5 mb-5 display-5">Empleados</h1>
@if(!isset($servicio))
<a class="btn btn-primary" href="{{route('formulario.empleado')}}" role="button"><i class="fa-solid fa-plus"></i>Añadir empleado</a>
@endif
<table class="table mt-5">
<thead>
    <tr>
    <th scope="col">Id empleado</th>
    <th scope="col">Nombre</th>
    <th scope="col">Apellidos</th>
    <th scope="col">NIF</th>
    <th scope="col">Numero seguridad social</th>
    <th scope="col">Telefono</th>
    <th scope="col">Tipo contrato</th>
    <th scope="col">Sueldo</th>



    </tr>
</thead>
<tbody>

@foreach ($empleados as $empleado)
    <tr>
    <th scope="row">{{$empleado->id}}</th>
    <td>{{$empleado->nombre}}</td>
    <td>{{$empleado->apellidos}}</td>
    <td>{{$empleado->nif}}</td>
    <td>{{$empleado->ss}}</td>
    <td>{{$empleado->telefono}}</td>
    <td>{{$empleado->tipocontrato}}</td>
    <td>{{$empleado->sueldo}}€</td>
    @if(Route::has('empleados') && !isset($servicio))
    <td><a href="{{route('empleados.servicios',$empleado)}}" class="btn btn-outline-primary">Servicios </a></td>
    <form action="{{route('empleado.edit',$empleado)}}" method="get">
        @csrf
        <td><input class="btn btn-outline-primary" type="submit" name="editar" value='Editar empleado'></td>
        </form>

    <form action="{{route('empleado.destroy',$empleado)}}" method="post">
         @csrf  
         @method('DELETE')
        <td><input class="btn btn-outline-danger" type="submit" name="eliminar" value='Eliminar empleado'></td>
        </form>

    
    @endif
</tr>
@endforeach
</tbody>
</table>

@endsection

