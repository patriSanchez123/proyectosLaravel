
@extends('layout.plantilla')


@section('title','home')


@section('content')

<div class="container">
        
    <div class="row justify-content-center mt-5" >
        
        <div class="col-md-3 col-lg-4 justify-content-center">
            <h1 class="display-5 mb-3 text-center">{{$empleado->nombre}} {{$empleado->apellidos}}</h1>
            <form action="{{route('empleado.update',$empleado)}}" method="post">
            {{-- token --}}
                
                @csrf
                @method('put')

                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre"class="form-control"  value="{{$empleado->nombre}}">
                    @error('nombre')
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label class>Apellidos:</label>
                    <input type="text" name="apellidos"class="form-control"  value="{{$empleado->apellidos}}">
                    @error('apellidos')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label class>NIF:</label>
                    <input type="text" name="nif"  class="form-control" value="{{$empleado->nif}}">
                        @error('nif')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
            
                <div class="form-group">
                    <label>Numero seguridad social:</label>
                    <input type="number" name="ss"  class="form-control" value="{{$empleado->ss}}">
                        @error('ss')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label>Telefono:</label>
                    <input type="text" name="telefono"  class="form-control" value="{{$empleado->telefono}}">
                        @error('telefono')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label>Tipo contrato:</label>
                    <input type="text" class="form-control" name='tipoContrato'  value="{{$empleado->tipocontrato}}">
                        @error('tipoContrato')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label>Sueldo:</label>
                    <input type="number" class="form-control" name='sueldo'  value="{{$empleado->sueldo}}">
                        @error('sueldo')
                        <small>*{{$message}}</small>
                        <br>
                        @enderror
                </div>
            <div class="text-center">
                <input type="submit" value="Editar empleado" class="btn btn-outline-primary mt-3 mb-5">
            </div>
            </form>
        </div>

@endsection

