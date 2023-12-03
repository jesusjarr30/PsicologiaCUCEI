<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Citas</title>
</head>
<body>

<h1>Tabla de Citas</h1>

<table class="border-spacing-1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Cliente</th>
            <th>Consultorio</th>
            <th>Fecha</th>
            <th>Atendido</th>
        </tr>
    </thead>
    <tbody>
        @foreach($citas as $cita)
            <tr>
                <td>{{ $cita->id }}</td>
                <td>{{ $cita->nombre_usuario }}</td>
                <td>{{ $cita->nombre_cliente }}</td>
                <td>{{ $cita->consultorio }}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->atendido }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
