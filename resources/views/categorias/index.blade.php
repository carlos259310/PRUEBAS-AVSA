@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Categorías</h1>
    <a href="{{ route('categorias.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Nueva Categoría
    </a>
</div>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card shadow">
    <div class="card-body">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>

                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>

                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td class="text-center">
                        <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-info btn-sm me-1">
                            <i class="bi bi-eye"></i> Ver
                        </a>
                        <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning btn-sm me-1">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection