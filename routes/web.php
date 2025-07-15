<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Listar todas las categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');

// Mostrar formulario para crear una nueva categoría
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');

// Guardar una nueva categoría
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');

// Mostrar una categoría específica
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');

// Mostrar formulario para editar una categoría
Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');

// Actualizar una categoría existente
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');

// Eliminar una categoría
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');



Route::resource('productos', ProductoController::class);