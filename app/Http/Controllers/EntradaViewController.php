<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use Illuminate\Support\Facades\Http;

class EntradaViewController  extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost/promass/public/api/v1/entradas');
        $entradas = $response->json();

        return view('entradas.index', compact('entradas'));
    }
    public function create()
    {
        return view('entradas.create');
    }

    public function buscar(Request $request)
    {
        $query = $request->input('q');
        $response = Http::get("http://localhost/promass/public/api/v1/buscar-entradas?q={$query}");
        $entradas = $response->json();

        return view('entradas.buscar', compact('entradas', 'query'));
    }
    public function detalle($id)
    {
        $response = Http::get("http://localhost/promass/public/api/v1/entradas/{$id}");
        $entrada = $response->json();

        return view('entradas.detalle', compact('entrada'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'fecha_publicacion' => 'required|date',
            'contenido' => 'required|string',
        ]);
    
        // Crea la entrada
        Entrada::create([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor'),
            'fecha_publicacion' => $request->input('fecha_publicacion'),
            'contenido' => $request->input('contenido'),
        ]);
    
        return redirect('/entradas')->with('success', 'Entrada creada exitosamente');
    }

}
