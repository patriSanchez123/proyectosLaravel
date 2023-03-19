
@extends('layout.plantilla')


@section('title','Mofidicar inmueble')


@section('content')

<div class="container">
        
    <div class="row justify-content-center mt-5" >
        
        <div class="col-md-3 col-lg-4 justify-content-center">
            <h1 class="display-5 mb-3">Datos del inmueble</h1>
            <form action="{{route('recinto.update',[$recinto,$cliente])}}" method="post">
                {{-- "{{route('recinto.update',$recinto)}} --}}
            {{-- token --}}
                @csrf
                @method('put')

                <div class="form-group">
                    <label>Dirección:</label>
                    <input type="text" name="direccion" class="form-control" value="{{$recinto->direccion}}">
                        @error('direccion')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label class>Tipo de recinto:</label>
                    <input type="text" name="tipoRecinto" class="form-control" value="{{$recinto->tiporecinto}}">
                        @error('tipoRecinto')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label class>Descripción:</label>
                    <textarea type="text" name="descripcion" class="form-control" >{{$recinto->descripcion}}</textarea>
                        @error('descripcion')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
            
                <div class="form-group">
                    <label>Teléfono administrador inmueble:</label>
                    <input type="text" name="telefono"  class="form-control" value="{{$recinto->telefono}}">
                        @error('telefono')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
            <div class="text-center">
                <br>
                <input type="submit" value="Añadir inmueble" class="btn btn-outline-primary mt-3 mb-5">
            </div>
            </form>
        </div>

@endsection

