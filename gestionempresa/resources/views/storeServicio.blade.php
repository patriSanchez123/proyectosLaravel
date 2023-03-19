
@extends('layout.plantilla')


@section('title','Crear servicio')


@section('content')

<div class="container">
        
    <div class="row justify-content-center mt-5" >
        
        <div class="col-md-3 col-lg-4 justify-content-center">
            <h1 class="display-5 mb-3">Datos servicios</h1>
            <form action="{{route('servicio.store',$recinto)}}" method="post">
            {{-- token --}}
                @csrf

                <div class="form-group">
                    <label>Tipo servicio:</label>
                    <input type="text" name="tipoServicio" class="form-control">
                        @error('tipoServicio')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label class>Horas mensuales:</label>
                    <input type="text" name="horasMensuales" class="form-control">
                        @error('horasMensuales')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
                <div class="form-group">
                    <label class>Descripción:</label>
                    {{-- pattern="^[0-9]{8}[a-zA-Z]$"  --}}
                    <textarea type="text" name="descripcion"  class="form-control" ></textarea>
                        @error('descripcion')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
            
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="number" name="precio"  class="form-control">
                        @error('precio')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
            <div class="text-center">
                <br>
                <input type="submit" value="Añadir servicio" class="btn btn-outline-primary mt-3 mb-5">
            </div>
            </form>
        </div>

@endsection

