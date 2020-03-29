@extends('layout.plantilla')

@section('seccion-main')     
    <!-- Alertas -->
    <div class="mt-4">
        @if( session('mensaje_eliminado') )
            <div class="alert alert-danger">{{ session('mensaje_eliminado') }}</div>
        @endif
    </div>    
    <!-- Fin Alertas -->

    <div id="listadoRegistros">                             
        <h1 class="display-4 mt-4">Notas</h1>
        <h2>
            <a class="btn btn-primary" href="javascript:mostrarForm(true)">Agregar</a>
        </h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="text-primary">id</th>
                <th scope="col" class="text-primary">nombre</th>
                <th scope="col" class="text-primary">descripcion</th>
                <th scope="col" class="text-primary">created_at</th>
                <th scope="col" class="text-primary">updated_at</th>
                <th scope="col" class="text-primary">update</th>
                <th scope="col" class="text-primary">delete</th>
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
                            <a href="{{ route('notas.buscar', $value['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                        <td>                            
                            <a href="{{ route('notas.eliminar', $value['id']) }}" class="btn btn-warning btn-sm">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
                
        <div class="float-left">
            Showing {{ $detalleNotas->firstItem() }} to {{ $detalleNotas->lastItem() }} of {{ $detalleNotas->total() }} entries        
        </div>        
        <div class="float-right">
            {{ $detalleNotas->links() }}
        </div>
    </div>

    <!-- Alertas -->
    <div class="mt-4">
        @if( session('mensaje') )
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif

        @error('nombre')
            <div class="alert alert-danger">El nombre es requerido</div>        
        @enderror

        @if( $errors->has('descripcion') )
            <div class="alert alert-danger">La descripción es requerida</div>
        @endif
    </div>    
    <!-- Fin Alertas -->

    <div id="formularioRegistros">        
        <h1 class="display-4 mt-4">Agregar</h1>
        <form method="POST" action="{{ route('notas.guardar') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ old('nombre') }}">
            <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" value="{{ old('descripcion') }}">            
            <h2>
                <button class="btn btn-primary" type="submit">Agregar</button>
                <a class="btn btn-primary" href="{{ route('notas.listar') }}">Atras</a>
            </h2>
        </form>                
    </div>     
@endsection

@section('seccion-scripts')
    <script src="{{ asset('js/notas.js') }}"></script>

    @if( $errors->any() || session('mensaje') )
        <script>
            mostrarForm(true);
            console.log('Hay alertas');
        </script>
    @endif
@endsection