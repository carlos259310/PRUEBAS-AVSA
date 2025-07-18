<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }



    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'cantidad' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id_categoria',
        ]);

        // Crear el producto
        $producto = new Producto();
        $producto->nombre = $validated['nombre'];
        $producto->cantidad = $validated['cantidad'];
        $producto->categoria_id = $validated['categoria_id'];
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }



    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'cantidad' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id_categoria',
        ]);
        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
