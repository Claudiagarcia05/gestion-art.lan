@extends('layouts.gestion')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('gestion.create') }}" class="btn btn-outline-primary">
        <i class="bi bi-plus-circle me-1"></i>
        Nuevo Artículo
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover table-sm mb-0">
        <thead class="table-light">
            <tr>
                <th style="width: 5%">ID</th>
                <th style="width: 25%">Título</th>
                <th style="width: 15%">Autor</th>
                <th style="width: 12%">Fecha</th>
                <th style="width: 10%">Estado</th>
                <th style="width: 18%">Secciones</th>
                <th style="width: 15%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articulos as $articulo)
            <tr>
                <td class="align-middle">{{ $articulo->id }}</td>
                <td class="align-middle">
                    {{ $articulo->titulo }}
                    @if($articulo->fecha_publicacion->isPast())
                        
                    @endif
                </td>
                <td class="align-middle">{{ $articulo->user->name }}</td>
                <td class="align-middle">{{ $articulo->fecha_publicacion->format('d/m/Y') }}</td>
                <td class="align-middle">
                    {{ $articulo->estado }}
                </td>
                <td class="align-middle">
                    @if(!empty($articulo->secciones))
                        {{ implode(', ', $articulo->secciones) }}
                    @endif
                </td>
                <td class="align-middle">
                    <a href="{{ route('gestion.show', $articulo->id) }}" class="btn btn-outline-success" title="Ver">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('gestion.edit', $articulo->id) }}" class="btn btn-outline-warning"> <i class="bi bi-pencil"></i></a>
                    <form action="{{ route('gestion.destroy', $articulo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Eliminar artículo?')"> <i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
@endsection