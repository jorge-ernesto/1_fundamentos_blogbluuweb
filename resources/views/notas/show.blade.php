@extends('layouts/plantilla')

@section('seccion-main')
    <div class="container-fluid">
        <h1 class="display-4 mt-4">Detalle de nota:</h1>
        <h4>id: {{ $detalleNota['id'] }}</h4>
        <h4>nombre: {{ $detalleNota['nombre'] }}</h4>
        <h4>descripcion: {{ $detalleNota['descripcion'] }}</h4>
        <h4>created_at: {{ $detalleNota['created_at'] }}</h4>
        <h4>updated_at: {{ $detalleNota['updated_at'] }}</h4>
        <h2>
            <a class="btn btn-primary" href="{{ route('notas.index') }}">Atras</a>    
        </h2>
    </div>
@endsection
