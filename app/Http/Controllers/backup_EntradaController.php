<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;

class EntradaController extends Controller
{
    // Mostrar el listado de entradas
    public function index()
    {
        $entradas = Entrada::all();
        return view('entradas.index', ['entradas' => $entradas]);
    }

    // Mostrar el formulario de alta
    public function create()
    {
        return view('entradas.create');
    }

    // Guardar una nueva entrada
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'fecha_publicacion' => 'required|date',
            'contenido' => 'required',
        ]);

        // Crear una nueva entrada
        $entrada = new Entrada;
        $entrada->titulo = $request->titulo;
        $entrada->autor = $request->autor;
        $entrada->fecha_publicacion = $request->fecha_publicacion;
        $entrada->contenido = $request->contenido;
        $entrada->save();

        // Redirigir al listado de entradas
        return redirect('/entradas')->with('success', 'Entrada creada correctamente');
    }
}
