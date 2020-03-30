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

    @if( session('mensaje_eliminado') )
        <div class="alert alert-danger">{{ session('mensaje_eliminado') }}</div>
    @endif
</div>    
<!-- Fin Alertas -->
