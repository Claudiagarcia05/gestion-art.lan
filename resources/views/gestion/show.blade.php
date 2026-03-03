@extends('layouts.gestion')

@section('content')
<div class="card">
    <div class="card-body">
        <form>
            @csrf

            <div class="mb-3">
                <label for="titulo" class="form-label fw-bold">Título</label>
                <input type="text" class="form-control bg-light" 
                       id="titulo" value="{{ $articulo->titulo }}" readonly>
            </div>

            <div class="mb-3">
                <label for="contenido" class="form-label fw-bold">Contenido</label>
                <textarea class="form-control bg-light" 
                          id="contenido" rows="4" readonly>{{ $articulo->contenido }}</textarea>
            </div>

            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label fw-bold">Fecha de Publicación</label>
                <input type="text" class="form-control bg-light" 
                       id="fecha_publicacion" value="{{ $articulo->fecha_publicacion->format('d/m/Y') }}" readonly>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label fw-bold">Estado</label>
                <input type="text" class="form-control bg-light" 
                       id="estado" value="{{ $articulo->estado }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Secciones</label>
                <div class="p-2 bg-light rounded">
                    @if(!empty($articulo->secciones))
                        @foreach($articulo->secciones as $seccion)
                            {{ $seccion }}@if(!$loop->last), @endif
                        @endforeach
                    @else
                        <span class="text-muted">No hay secciones seleccionadas</span>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('gestion.index') }}" class="btn btn-outline-secondary"> <i class="bi bi-arrow-left"></i></a>
            </div>
        </form>
    </div>
</div>
@endsection