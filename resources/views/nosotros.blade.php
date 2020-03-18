@extends('layout/plantilla')

@section('seccion-title')
    
    <h1>Este es mi equipo de trabajo</h1>

    @foreach($dataEquipo as $key=>$value)
        <a href="{{ route('enlace-nosotros', $dataEquipo[$key]['nombre']) }}" class="h4 text-danger">{{ $dataEquipo[$key]['nombre'] }}</a><br>
    @endforeach

    @if(isset($nombre))
        <p>La variable nombre fue especificada: {{ $nombre }}</p>
    @else
        <p>La variable nombre no fue especificada</p>
    @endif

@endsection