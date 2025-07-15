<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //
    public function index()
    {
        // Logic to list categories

        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    //crear
    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable|max:500',
        ]);

        Categoria::create($request);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable'
        ]);
        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente');
    }
}
