<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Entradas</title>
</head>
<body>



    <h1>Listado de Entradas</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Fecha de publicación</th>
                <th>Contenido</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entradas as $entrada)
                <tr>
                <td>{{ $entrada['titulo'] }}</td>
                <td>{{ $entrada['autor'] }}</td>
                <td>{{ $entrada['fecha_publicacion'] }}</td>
                <td>{{ substr($entrada['contenido'], 0, 70) }}...</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
