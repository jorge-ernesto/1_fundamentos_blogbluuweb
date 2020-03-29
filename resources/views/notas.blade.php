@extends('layout.plantilla')

@section('seccion-main') 
    <!-- Alertas -->
    @if( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif

    @error('nombre')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">El nombre es requerido</div>        
    @enderror

    @if( $errors->has('descripcion') )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">La descripción es requerida</div>
    @endif
    <!-- Fin Alertas -->

    <div id="listadoRegistros">
        <h2>
            <a class="btn btn-primary" href="javascript:mostrarForm(true)">Agregar</a>
        </h2>              
        
        <h1 class="display-4">Notas</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">nombre</th>
                <th scope="col">descripcion</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at</th>
                <th scope="col">update</th>
            </tr>
            </thead>
            <tbody>
                @foreach($detalleNotas as $key=>$value)
                    <tr>
                        <th>
                            <a href="{{ route('notas.listar', $value['id']) }}">{{ $value['id'] }}</a>
                        </th>
                        <td>{{ $value['nombre'] }}</td>
                        <td>{{ $value['descripcion'] }}</td>
                        <td>{{ $value['created_at'] }}</td>
                        <td>{{ $value['updated_at'] }}</td>
                        <td>
                            <a href="{{route('notas.buscar', $value['id'])}}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="formularioRegistros">        
        <h1>Agregar</h1>       
        <form method="POST" action="{{ route('notas.guardar') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2"/>
            <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2"/>
            <h2>
                <button class="btn btn-primary" type="submit">Agregar</button>
                <a class="btn btn-primary" href="{{ route('notas.listar') }}">Atras</a>
            </h2>
        </form>                
    </div>     
@endsection

@section('seccion-scripts')
    <script src="{{ asset('js/notas.js') }}"></script>

    @if( $errors->any() )
        <script>
            mostrarForm(true);
            console.log('Hay errores');
        </script>
    @endif
@endsection