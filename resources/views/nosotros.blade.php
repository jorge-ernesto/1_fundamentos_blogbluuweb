@extends('layout.plantilla')

@section('seccion-container')
    
    <h1>Este es mi equipo de trabajo</h1>

    @foreach($dataEquipo as $key=>$value)
        <a href="{{ route('enlace-nosotros', $value['nombre']) }}" class="h4 text-danger">{{ $value['nombre'] }}</a><br>
    @endforeach

    @if(isset($nombre))
        <p>La variable nombre fue especificada: {{ $nombre }}</p>
    @else
        <p>La variable nombre no fue especificada</p>
    @endif

@endsection