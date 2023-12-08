<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EntradaApiController extends Controller
{
    public function index()
    {
        $entradas = Entrada::all();
        return response()->json($entradas);
    }

    public function show($id)
    {
        $entrada = Entrada::find($id);

        if (!$entrada) {
            return response()->json(['error' => 'Entrada no encontrada'], 404);
        }

        return response()->json($entrada);
    }

    // public function store(Request $request)
    // {
    //     $entrada = Entrada::create($request->all());
    //     return response()->json($entrada, 201);
    // }
    public function buscar(Request $request)
    {
        $query = $request->input('q');
    
        $entradas = Entrada::where('titulo', 'like', "%{$query}%")
            ->orWhere('autor', 'like', "%{$query}%")
            ->orWhere('contenido', 'like', "%{$query}%")
            ->get();
    
        return response()->json($entradas);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'autor' => 'required|string|max:255',
            'fecha_publicacion' => 'required|date',
        ]);

        $entrada = Entrada::create($request->all());

        return response()->json($entrada, 201); // creado =D
    }


    public function update(Request $request, $id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->update($request->all());
        return response()->json($entrada, 200);
    }

    public function destroy($id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();
        return response()->json(null, 204);
    }

}
