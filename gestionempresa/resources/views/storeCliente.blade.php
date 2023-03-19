
@extends('layout.plantilla')


@section('title','home')


@section('content')

<div class="container">
        
    <div class="row justify-content-center mt-5" >
        
        <div class="col-md-3 col-lg-4 justify-content-center">
            <h1 class="display-5 mb-3">Datos empleado</h1>
            <form action="{{route('cliente.store')}}" method="post">
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
                    <input type="text" name="apellidos"class="form-control" >
                    @error('apellidos')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label>Telefono:</label>
                    <input type="text" name="telefono"  class="form-control">
                        @error('telefono')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
            
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email"  class="form-control">
                        @error('email')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
            <div class="text-center">
                <br>
                <input type="submit" value="Añadir cliente" class="btn btn-outline-primary mt-3 mb-5">
            </div>
            </form>
        </div>

@endsection

