@extends('layouts/plantilla')

@section('seccion-main')
    <div class="container-fluid">
        @include('notas.alerts')

        <h1 class="display-4 mt-4">Editar</h1>
        <form method="POST" action="{{ route('notas.editar', $detalleNota['id']) }}">
            @method('PUT')
            @csrf
            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $detalleNota['nombre'] }}">
            <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" value="{{ $detalleNota['descripcion'] }}">        
            <h2>
                <button class="btn btn-warning" type="submit">Editar</button>
                <a class="btn btn-primary" href="{{ route('notas.listar') }}">Atras</a>
            </h2>
        </form>
    </div>
@endsection
