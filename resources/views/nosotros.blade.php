@extends('layouts.plantilla')

@section('seccion-main')
    <div class="container-fluid">
        <h1 class="mt-4">Nosotros</h1>

        @foreach($dataEquipo as $key=>$value)
            <a href="{{ route('nosotros.index', $value['nombre']) }}" class="h4 text-danger">{{ $value['nombre'] }}</a><br>
        @endforeach

        @if(isset($nombre))
            <p>La variable nombre fue especificada: {{ $nombre }}</p>
        @else
            <p>La variable nombre no fue especificada</p>
        @endif
    </div>
@endsection
