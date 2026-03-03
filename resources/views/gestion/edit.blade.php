@extends('layouts.gestion')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('gestion.update', $articulo->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titulo" class="form-label">Título <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('titulo') is-invalid @enderror" 
                       id="titulo" name="titulo" value="{{ old('titulo', $articulo->titulo) }}" required>
                @error('titulo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea class="form-control @error('contenido') is-invalid @enderror" 
                          id="contenido" name="contenido" rows="4">{{ old('contenido', $articulo->contenido) }}</textarea>
                @error('contenido')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de Publicación <span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('fecha_publicacion') is-invalid @enderror" 
                       id="fecha_publicacion" name="fecha_publicacion" 
                       value="{{ old('fecha_publicacion', $articulo->fecha_publicacion->format('Y-m-d')) }}" required>
                @error('fecha_publicacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado <span class="text-danger">*</span></label>
                <select class="form-select @error('estado') is-invalid @enderror" 
                        id="estado" name="estado" required>
                    <option value="">Seleccionar...</option>
                    <option value="Cancelado" {{ old('estado', $articulo->estado) == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                    <option value="Borrador" {{ old('estado', $articulo->estado) == 'Borrador' ? 'selected' : '' }}>Borrador</option>
                    <option value="Publicado" {{ old('estado', $articulo->estado) == 'Publicado' ? 'selected' : '' }}>Publicado</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Secciones <span class="text-danger">*</span></label>
                <div>
                    @php $secciones_old = old('secciones', $articulo->secciones ?? []) @endphp
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="secciones[]" value="Portada" 
                               {{ in_array('Portada', $secciones_old) ? 'checked' : '' }}>
                        <label class="form-check-label">Portada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="secciones[]" value="Interior"
                               {{ in_array('Interior', $secciones_old) ? 'checked' : '' }}>
                        <label class="form-check-label">Interior</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="secciones[]" value="Foros"
                               {{ in_array('Foros', $secciones_old) ? 'checked' : '' }}>
                        <label class="form-check-label">Foros</label>
                    </div>
                </div>
                @error('secciones')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('gestion.index') }}" class="btn btn-outline-secondary"> <i class="bi bi-arrow-left"></i></a>
                <button type="submit" class="btn btn-outline-info">
                    Actualizar Artículo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection