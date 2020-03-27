@extends('layout/plantilla')

@section('seccion-container')
    
    <h1 class="display-4">Notas</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nombre</th>
            <th scope="col">descripcion</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
        </tr>
        </thead>
        <tbody>
            @foreach($notas as $key=>$value)
                <tr>
                    <th>{{ $value['id'] }}</th>
                    <td>
                        <a href="{{ route('enlace-notas', $value['id']) }}">
                            {{ $value['nombre'] }}
                        </a>
                    </td>
                    <td>{{ $value['descripcion'] }}</td>
                    <td>{{ $value['created_at'] }}</td>
                    <td>{{ $value['updated_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
