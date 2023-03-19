
@extends('layout.plantilla')


@section('title','home')


@section('content')

<div class="container">
        
    <div class="row justify-content-center mt-5" >
        
        <div class="col-md-3 col-lg-4 justify-content-center">
            <h1 class="display-5 mb-3">Datos empleado</h1>
            <form action="{{route('empleados.crear')}}" method="post">
            {{-- token --}}
                @csrf

                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre"class="form-control">
                        @error('nombre')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label class>Apellidos:</label>
                    <input type="text" name="apellidos"class="form-control">
                        @error('apellidos')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label class>NIF:</label>
                    {{-- pattern="^[0-9]{8}[a-zA-Z]$"  --}}
                    <input type="text" name="nif"  class="form-control" >
                        @error('nif')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
            
                <div class="form-group">
                    <label>Numero seguridad social:</label>
                    <input type="number" name="ss"  class="form-control">
                        @error('ss')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label>Telefono:</label>
                    {{-- pattern="[0-9]{9}" --}}
                    <input type="text" name="telefono" class="form-control">
                        @error('telefono')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label>Tipo contrato:</label>
                    <input type="text" class="form-control" name='tipoContrato' >
                        @error('tipoContrato')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label>Sueldo:</label>
                    <input type="number" class="form-control" name='sueldo' >
                    @error('sueldo')
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                </div>
            <div class="text-center">
                <br>
                <input type="submit" value="Añadir empleado" class="btn btn-outline-primary mt-3 mb-5">
            </div>
            </form>
        </div>

@endsection

