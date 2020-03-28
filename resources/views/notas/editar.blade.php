@extends('layout/plantilla')

@section('seccion-container')
    
    <h1>Editar</h1>
    
    <!-- Alertas -->
    @if (session('mensaje'))
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif

    @error('nombre')
        <div class="alert alert-danger">El nombre es obligatorio</div>
    @enderror

    @error('descripcion')
        <div class="alert alert-danger">La descripción es obligatoria</div>
    @enderror
    <!-- Fin Alertas -->

    <form method="POST" action="{{ route('notas.editar', $nota->id) }}">
        @method('PUT')
        @csrf        
        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $nota->nombre }}">
        <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" value="{{ $nota->descripcion }}">        
        <h2>
            <button class="btn btn-warning" type="submit">Editar</button>
            <a class="btn btn-primary" href="{{ route('notas.listar') }}">Atras</a>
        </h2>
    </form>
        
@endsection