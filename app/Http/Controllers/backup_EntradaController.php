<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::all();
        return view('entradas.index', ['entradas' => $entradas]);
    }

    public function create()
    {
        return view('entradas.create');
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'fecha_publicacion' => 'required|date',
            'contenido' => 'required',
        ]);

        $entrada = new Entrada;
        $entrada->titulo = $request->titulo;
        $entrada->autor = $request->autor;
        $entrada->fecha_publicacion = $request->fecha_publicacion;
        $entrada->contenido = $request->contenido;
        $entrada->save();

        return redirect('/entradas')->with('success', 'Entrada creada correctamente');
    }
}
