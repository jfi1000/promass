<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Entrada</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-8">
        @if ($entrada)
            <h1 class="text-3xl font-bold mb-4">{{ $entrada['titulo'] }}</h1>
            
            <p class="text-gray-600 mb-4">Autor: {{ $entrada['autor'] }}</p>
            
            <p class="text-gray-600 mb-4">Fecha de publicación: {{ $entrada['fecha_publicacion'] }}</p>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <p class="text-gray-800">{{ $entrada['contenido'] }}</p>
            </div>
        @else
            <p class="text-red-500">La entrada no existe.</p>
        @endif
    </div>

</body>
</html>
