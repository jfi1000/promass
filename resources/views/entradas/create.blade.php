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


    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <strong class="font-bold">Por favor, corrige los siguientes errores:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/entradas') }}" method="post" class="max-w-md bg-white rounded-lg overflow-hidden mx-auto">
        @csrf
        <div class="bg-gray-200 text-gray-900 p-4">
        <h1 class="text-2xl font-bold mb-4">Crear Entrada</h1>
        </div>
        <div class="mb-4">
            <label for="titulo" class="block text-gray-600 text-sm font-semibold mb-2">Título:</label>
            <input type="text" name="titulo" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="autor" class="block text-gray-600 text-sm font-semibold mb-2">Autor:</label>
            <input type="text" name="autor" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="fecha_publicacion" class="block text-gray-600 text-sm font-semibold mb-2">Fecha de publicación:</label>
            <input type="date" name="fecha_publicacion" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="contenido" class="block text-gray-600 text-sm font-semibold mb-2">Contenido:</label>
            <textarea name="contenido" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" required></textarea>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Guardar</button>
        </div>
    </form>
</body>
</html>
