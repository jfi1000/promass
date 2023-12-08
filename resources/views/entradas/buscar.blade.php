<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Entrada</title>
    <!-- Asegúrate de incluir los estilos de Tailwind CSS en tu proyecto -->
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-8">

<h1>Buscar Entradas por: autor, titulo o contenido </h1>

<form action="{{ url('/entradas/buscar-entradas') }}" method="get">
    <div>
        <label for="q">Búsqueda:</label>
        <input type="text" name="q" value="{{ $query }}">
    </div>

    <div>
        <button type="submit">Buscar</button>
    </div>
</form>


    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-4">Resultados de la búsqueda para "{{ $query }}"</h1>

        @forelse ($entradas as $entrada)
            <a href="{{ url('/entradas/' . $entrada['id']) }}" class="block bg-white hover:bg-gray-100 border border-gray-300 p-4 mb-4 rounded-md">
                <h2 class="text-xl font-semibold">{{ $entrada['titulo'] }}</h2>
                <p class="text-gray-600">{{ $entrada['autor'] }}</p>
                <p class="text-gray-600">{{ $entrada['contenido'] }}</p>
            </a>
        @empty
            <p>No se encontraron resultados.</p>
        @endforelse

        @auth
            <a href="{{ url('/entradas/create') }}" class="btn btn-primary">Crear Entrada</a>
        @endauth

    </div>
    </body>
</html>
