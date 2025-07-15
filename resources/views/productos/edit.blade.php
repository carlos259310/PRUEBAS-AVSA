@extends('layouts.app')

@section('content')
<h1 class="mb-4">Editar Producto</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ old('cantidad', $producto->cantidad) }}" min="0" required>
            </div>
            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoría:</label>
                <select id="categoria_id" name="categoria_id" class="form-select" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_Categoria }}" {{ $producto->categoria_id == $categoria->id_Categoria ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection