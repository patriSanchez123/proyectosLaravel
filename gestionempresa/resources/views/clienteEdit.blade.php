
@extends('layout.plantilla')


@section('title','home')


@section('content')

<div class="container">
        
    <div class="row justify-content-center mt-5" >
        
        <div class="col-md-3 col-lg-4 justify-content-center">
            <h1 class="display-5 mb-3 text-center">{{$cliente->nombre}} {{$cliente->apellidos}}</h1>
            <form action="{{route('cliente.update',$cliente)}}" method="post">
                
                @csrf
                @method('put')

                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre"class="form-control"  value="{{$cliente->nombre}}">
                    @error('nombre')
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label class>Apellidos:</label>
                    <input type="text" name="apellidos"class="form-control"  value="{{$cliente->apellidos}}">
                    @error('apellidos')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label>Telefono:</label>
                    <input type="text" name="telefono"  class="form-control" value="{{$cliente->telefono}}">
                        @error('telefono')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
            
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email"  class="form-control" value="{{$cliente->email}}">
                        @error('email')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                
            <div class="text-center">
                <input type="submit" value="Editar cliente" class="btn btn-outline-primary mt-3 mb-5">
            </div>
            </form>
        </div>

@endsection

